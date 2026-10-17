<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class CategoryController extends Controller
{
    public function index(): View
    {
        return view('admin.blog.categories', ['categories' => BlogCategory::withCount('posts')->orderBy('name')->get()]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate(['name' => ['required', 'string', 'max:120'], 'description' => ['nullable', 'string', 'max:1000']]);
        BlogCategory::create([...$data, 'slug' => $this->slug($data['name'])]);
        return back()->with('status', 'Category created.');
    }

    public function update(Request $request, BlogCategory $category): RedirectResponse
    {
        $data = $request->validate(['name' => ['required', 'string', 'max:120'], 'description' => ['nullable', 'string', 'max:1000'], 'slug' => ['required', 'string', 'max:255', Rule::unique('blog_categories', 'slug')->ignore($category->id)]]);
        $category->update($data);
        return back()->with('status', 'Category updated.');
    }

    public function destroy(BlogCategory $category): RedirectResponse
    {
        $category->delete();
        return back()->with('status', 'Category deleted. Posts in this category are kept without a category.');
    }

    private function slug(string $name): string
    {
        $base = Str::slug($name) ?: 'category';
        $slug = $base;
        for ($i = 2; BlogCategory::where('slug', $slug)->exists(); $i++) $slug = $base.'-'.$i;
        return $slug;
    }
}
