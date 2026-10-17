<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    public function __invoke(): Response
    {
        $posts = BlogPost::visible()->orderBy('published_at')->get();
        return response()->view('blog.sitemap', compact('posts'))->header('Content-Type', 'application/xml; charset=UTF-8');
    }
}
