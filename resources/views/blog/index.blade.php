@extends('blog.layout')
@section('main-class', 'blog-index-main')
@section('seo')<link rel="canonical" href="{{ url()->current() }}">@include('components.open-graph', ['socialTitle' => $title, 'socialDescription' => $description, 'socialImage' => asset('images/bd-explorations-1.webp'), 'socialImageAlt' => 'Make My Tours & Travels exploring Mumbai'])@endsection
@section('content')
    <section class="blog-hero" aria-labelledby="blog-page-title">
        <div class="blog-hero-inner">
            <nav class="blog-breadcrumb" aria-label="Breadcrumb">
                <a href="{{ url('/') }}">Home</a>
                <span aria-hidden="true">&#8250;</span>
                <span aria-current="page">Blog</span>
            </nav>
            <div class="blog-hero-copy">
                <span class="blog-hero-label">NOTES FOR THE ROAD</span>
                <h1 id="blog-page-title">Travel well. See more.</h1>
                <p>Thoughtful guides and useful ideas to help you make every journey count.</p>
            </div>
        </div>
    </section>
    <section class="blog-list-section"><div class="blog-section-heading"><div><span class="eyebrow">THE JOURNAL</span><h2>{{ $title === 'Travel stories' ? 'Stories to take with you' : $title }}</h2></div><span class="blog-count">{{ $posts->total() }} {{ Str::plural('story',$posts->total()) }}</span></div>
        @if($posts->isEmpty())<div class="blog-empty"><span>✦</span><h2>Stories are on their way</h2><p>Check back soon for fresh travel inspiration.</p></div>@else<div class="public-post-grid">@foreach($posts as $post)<article class="public-post-card"><a href="{{ route('blog.show',$post->slug) }}" class="public-post-image">@if($post->featured_image)<img src="{{ asset('storage/'.$post->featured_image) }}" alt="" loading="lazy">@else<div class="image-placeholder"><span>MMT</span></div>@endif</a><div class="public-post-body">@if($post->category)<a class="post-category" href="{{ route('blog.category',$post->category->slug) }}">{{ $post->category->name }}</a>@else<span class="post-category">Travel notes</span>@endif<span class="post-date">{{ $post->published_at->format('M j, Y') }} · {{ max(1,ceil(str_word_count(strip_tags($post->content))/220)) }} min read</span><h3><a href="{{ route('blog.show',$post->slug) }}">{{ $post->title }}</a></h3><p>{{ $post->excerpt ?: str($post->content)->stripTags()->limit(150) }}</p><a href="{{ route('blog.show',$post->slug) }}" class="read-link">Read story <span>→</span></a></div></article>@endforeach</div><div class="blog-pagination">{{ $posts->onEachSide(1)->links('pagination::simple-tailwind') }}</div>@endif
    </section>
@endsection
