<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use App\Models\BlogPost;
use App\Models\BlogPostSlugHistory;
use App\Models\BlogTag;
use App\Support\BlogContentSanitizer;
use App\Support\BlogImageStorage;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class PostController extends Controller
{
    public function index(Request $request): View
    {
        $posts = BlogPost::with(['author', 'category'])->when($request->filled('search'), function (Builder $query) use ($request) {
            $term = '%'.$request->string('search')->trim().'%';
            $query->where(fn ($search) => $search->where('title', 'like', $term)->orWhere('excerpt', 'like', $term));
        })->when($request->filled('status'), fn ($query) => $query->where('status', $request->input('status')))
            ->when($request->filled('category'), fn ($query) => $query->where('category_id', $request->integer('category')))
            ->latest('updated_at')->paginate(12)->withQueryString();

        return view('admin.blog.index', ['posts' => $posts, 'categories' => BlogCategory::orderBy('name')->get()]);
    }

    public function create(): View
    {
        return view('admin.blog.form', ['post' => new BlogPost(), 'categories' => BlogCategory::orderBy('name')->get(), 'tagNames' => '']);
    }

    public function store(Request $request, BlogContentSanitizer $sanitizer, BlogImageStorage $images): RedirectResponse
    {
        $data = $this->validated($request);
        $tags = $data['tags'] ?? '';
        unset($data['tags']);
        $data['slug'] = $this->uniqueSlug($data['slug'] ?: $data['title']);
        $data['user_id'] = $request->user()->id;
        $data['content'] = $sanitizer->clean($data['content']);
        $data['published_at'] = $this->publicationTime($data['status'], $data['published_at'] ?? null);
        if ($request->hasFile('featured_image')) $data['featured_image'] = $images->store($request->file('featured_image'), 'blog/featured');

        $post = DB::transaction(function () use ($data, $tags) {
            $post = BlogPost::create($data);
            $post->tags()->sync($this->syncTags($tags));
            return $post;
        });

        return redirect()->route('admin.blog.edit', $post)->with('status', 'Post created successfully.');
    }

    public function edit(BlogPost $post): View
    {
        return view('admin.blog.form', ['post' => $post->load('tags'), 'categories' => BlogCategory::orderBy('name')->get(), 'tagNames' => $post->tags->pluck('name')->implode(', ')]);
    }

    public function update(Request $request, BlogPost $post, BlogContentSanitizer $sanitizer, BlogImageStorage $images): RedirectResponse
    {
        $data = $this->validated($request, $post);
        $tags = $data['tags'] ?? '';
        unset($data['tags']);
        $data['slug'] = $this->uniqueSlug($data['slug'] ?: $data['title'], $post);
        $data['content'] = $sanitizer->clean($data['content']);
        $data['published_at'] = $this->publicationTime($data['status'], $data['published_at'] ?? null);
        $removeImage = $request->boolean('remove_featured_image');
        $previousImage = $post->featured_image;
        unset($data['remove_featured_image']);
        if ($request->hasFile('featured_image')) $data['featured_image'] = $images->store($request->file('featured_image'), 'blog/featured');
        elseif ($removeImage) $data['featured_image'] = null;
        else unset($data['featured_image']);

        DB::transaction(function () use ($post, $data, $tags) {
            if ($post->slug !== $data['slug']) BlogPostSlugHistory::firstOrCreate(['old_slug' => $post->slug], ['post_id' => $post->id]);
            $post->update($data);
            $post->tags()->sync($this->syncTags($tags));
        });
        if ($removeImage || $request->hasFile('featured_image')) {
            if ($previousImage) Storage::disk('public')->delete($previousImage);
        }

        return redirect()->route('admin.blog.edit', $post)->with('status', 'Post updated successfully.');
    }

    public function destroy(BlogPost $post): RedirectResponse
    {
        if ($post->featured_image) Storage::disk('public')->delete($post->featured_image);
        $post->delete();
        return redirect()->route('admin.blog.index')->with('status', 'Post deleted.');
    }

    public function bulkDestroy(Request $request): RedirectResponse
    {
        $data = $request->validate(['post_ids' => ['required', 'array', 'min:1'], 'post_ids.*' => ['integer', 'exists:blog_posts,id']]);
        BlogPost::whereIn('id', $data['post_ids'])->get()->each(function ($post) {
            if ($post->featured_image) Storage::disk('public')->delete($post->featured_image);
            $post->delete();
        });
        return redirect()->route('admin.blog.index')->with('status', count($data['post_ids']).' posts deleted.');
    }

    public function togglePublish(BlogPost $post): RedirectResponse
    {
        if ($post->status === 'published') {
            $post->update(['status' => 'draft']);
            $message = 'Post unpublished.';
        } else {
            $post->update(['status' => 'published', 'published_at' => $post->published_at && $post->published_at->isPast() ? $post->published_at : now()]);
            $message = 'Post published.';
        }
        return back()->with('status', $message);
    }

    private function validated(Request $request, ?BlogPost $post = null): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', Rule::unique('blog_posts', 'slug')->ignore($post?->id), 'regex:/^[a-z0-9]+(?:-[a-z0-9]+)*$/i'],
            'excerpt' => ['nullable', 'string', 'max:1000'],
            'content' => ['required', 'string'],
            'featured_image' => ['nullable', 'image', 'mimes:jpeg,png,webp', 'max:5120'],
            'remove_featured_image' => ['nullable', 'boolean'],
            'category_id' => ['nullable', 'integer', 'exists:blog_categories,id'],
            'tags' => ['nullable', 'string', 'max:1000'],
            'status' => ['required', Rule::in(['draft', 'published', 'scheduled'])],
            'published_at' => ['nullable', 'date', Rule::requiredIf($request->input('status') === 'scheduled'), Rule::when($request->input('status') === 'scheduled', ['after:now'])],
            'meta_title' => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string', 'max:320'],
            'focus_keyword' => ['nullable', 'string', 'max:255'],
            'canonical_url' => ['nullable', 'url', 'max:2048'],
            'og_title' => ['nullable', 'string', 'max:255'],
            'og_description' => ['nullable', 'string', 'max:320'],
            'og_image' => ['nullable', 'string', 'max:2048'],
            'robots_index' => ['required', Rule::in(['index', 'noindex'])],
            'robots_follow' => ['required', Rule::in(['follow', 'nofollow'])],
        ]);
    }

    private function uniqueSlug(string $value, ?BlogPost $post = null): string
    {
        $base = Str::slug($value) ?: 'post';
        $slug = $base;
        $suffix = 2;
        while (BlogPost::where('slug', $slug)->when($post, fn ($query) => $query->whereKeyNot($post->id))->exists()
            || BlogPostSlugHistory::where('old_slug', $slug)->when($post, fn ($query) => $query->where('post_id', '!=', $post->id))->exists()) {
            $slug = $base.'-'.$suffix++;
        }
        return $slug;
    }

    private function publicationTime(string $status, mixed $publishedAt): ?string
    {
        if ($status === 'draft') return null;
        if ($status === 'published') return $publishedAt ? Carbon::parse($publishedAt)->toDateTimeString() : now()->toDateTimeString();
        return $publishedAt ? Carbon::parse($publishedAt)->toDateTimeString() : null;
    }

    private function syncTags(string $value): array
    {
        return collect(explode(',', $value))->map(fn ($tag) => trim($tag))->filter()->unique(fn ($tag) => Str::lower($tag))->map(function ($name) {
            $base = Str::slug($name) ?: 'tag';
            $slug = $base;
            $suffix = 2;
            while (BlogTag::where('slug', $slug)->where('name', '!=', $name)->exists()) $slug = $base.'-'.$suffix++;
            return BlogTag::firstOrCreate(['slug' => $slug], ['name' => $name])->id;
        })->all();
    }
}
