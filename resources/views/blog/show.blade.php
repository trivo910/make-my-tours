@extends('blog.layout')
@section('seo')
    <link rel="canonical" href="{{ $canonical }}">
    <meta name="robots" content="{{ $post->robots_index }},{{ $post->robots_follow }}">
    @include('components.open-graph', ['socialTitle' => $post->og_title ?: $title, 'socialDescription' => $post->og_description ?: $description, 'socialUrl' => $canonical, 'socialImage' => $ogImage ? (str_starts_with($ogImage, 'http') ? $ogImage : asset($ogImage)) : asset('images/bd-explorations-1.png'), 'socialImageAlt' => $post->title, 'socialType' => 'article'])
    <meta property="article:published_time" content="{{ $post->published_at->toIso8601String() }}">
    <script type="application/ld+json">@json($structuredData, JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE|JSON_HEX_TAG|JSON_HEX_APOS|JSON_HEX_AMP|JSON_HEX_QUOT)</script>
@endsection
@section('main-class', 'blog-article-main')
@section('content')
    <section class="blog-hero article-hero" aria-labelledby="article-page-title">
        <div class="blog-hero-inner">
            <nav class="blog-breadcrumb" aria-label="Breadcrumb">
                <a href="{{ url('/') }}">Home</a>
                <span aria-hidden="true">&#8250;</span>
                <a href="{{ route('blog.index') }}">Blog</a>
                <span aria-hidden="true">&#8250;</span>
                <span aria-current="page">{{ $post->category?->name ?? 'Travel notes' }}</span>
            </nav>
            <div class="blog-hero-copy">
                <span class="blog-hero-label">{{ $post->category?->name ?? 'TRAVEL NOTES' }}</span>
                <h1 id="article-page-title">{{ $post->title }}</h1>
                <!-- @if ($post->excerpt)<p>{{ $post->excerpt }}</p>@endif -->
            </div>
        </div>
    </section>
    <article class="article-wrap"><header class="article-header"><a class="article-category" href="{{ $post->category ? route('blog.category',$post->category->slug) : route('blog.index') }}">{{ $post->category?->name ?? 'Travel notes' }}</a><div class="article-byline"><span class="byline-avatar">{{ mb_substr($post->author?->name ?? 'M',0,1) }}</span><span><strong>{{ $post->author?->name ?? config('app.name') }}</strong><small>{{ $post->published_at->format('F j, Y') }} · {{ max(1,ceil(str_word_count(strip_tags($post->content))/220)) }} min read</small></span></div></header>
        @if($post->featured_image)<figure class="article-featured"><img src="{{ asset('storage/'.$post->featured_image) }}" alt="{{ $post->title }}"></figure>@endif
        <div class="article-layout"><div class="article-content">{!! $post->content !!}</div><aside class="article-aside"><div class="aside-sticky"><span class="eyebrow">IN THIS STORY</span><p>{{ $post->focus_keyword ?: 'A little inspiration for the journey ahead.' }}</p>@if($post->category)<a href="{{ route('blog.category',$post->category->slug) }}" class="aside-link">More in {{ $post->category->name }} →</a>@endif<div class="share-card"><span class="eyebrow">PASS IT ALONG</span><p>Know someone planning a trip?</p><a href="https://wa.me/?text={{ urlencode($post->title.' '.route('blog.show',$post->slug)) }}" target="_blank" rel="noopener">Share this story ↗</a></div></div></aside></div>
        @if($post->tags->isNotEmpty())<footer class="article-tags"><span class="eyebrow">EXPLORE TOPICS</span>@foreach($post->tags as $tag)<a href="{{ route('blog.tag',$tag->slug) }}">#{{ $tag->name }}</a>@endforeach</footer>@endif
    </article>
@endsection
