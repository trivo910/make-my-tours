<?php

namespace App\Http\Controllers;

use App\Models\BlogCategory;
use App\Models\BlogPost;
use App\Models\BlogPostSlugHistory;
use App\Models\BlogTag;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class BlogController extends Controller
{
    public function index(): View
    {
        return $this->listing(BlogPost::visible(), 'Travel stories', 'Travel guides, ideas and useful insights from Make My Tours & Travels.');
    }

    public function category(string $slug): View
    {
        $category = BlogCategory::where('slug', $slug)->firstOrFail();
        return $this->listing(BlogPost::visible()->where('category_id', $category->id), $category->name, $category->description ?: 'Travel stories in '.$category->name.'.');
    }

    public function tag(string $slug): View
    {
        $tag = BlogTag::where('slug', $slug)->firstOrFail();
        return $this->listing(BlogPost::visible()->whereHas('tags', fn ($query) => $query->where('blog_tags.id', $tag->id)), $tag->name, 'Travel stories tagged '.$tag->name.'.');
    }

    public function show(string $slug): View|RedirectResponse
    {
        $post = BlogPost::visible()->with(['author', 'category', 'tags'])->where('slug', $slug)->first();
        if (! $post) {
            $history = BlogPostSlugHistory::with('post')->where('old_slug', $slug)->first();
            abort_unless($history && $history->post?->status === 'published' && $history->post->published_at?->lte(now()), 404);
            return redirect()->route('blog.show', $history->post->slug, 301);
        }

        $title = $post->meta_title ?: $post->title;
        $description = $post->meta_description ?: ($post->excerpt ?: str($post->content)->stripTags()->limit(160));
        $canonical = $post->canonical_url ?: route('blog.show', $post->slug);
        $ogImage = $post->og_image ?: ($post->featured_image ? asset('storage/'.$post->featured_image) : null);

        return view('blog.show', [
            'post' => $post,
            'title' => $title,
            'description' => $description,
            'canonical' => $canonical,
            'ogImage' => $ogImage,
            'seoTitle' => $title,
            'seoDescription' => $description,
        ]);
    }

    private function listing($query, string $title, string $description): View
    {
        $posts = $query->with(['category', 'tags', 'author'])->latest('published_at')->paginate(9)->withQueryString();
        return view('blog.index', compact('posts', 'title', 'description') + ['seoTitle' => $title, 'seoDescription' => $description]);
    }
}
