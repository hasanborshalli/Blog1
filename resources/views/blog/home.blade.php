@extends('layouts.app')

@section('content')
<section class="hero-section">
    <div class="container">
        @if($featuredPost)
        <div class="featured-post">
            <span class="badge">Featured</span>
            <h1>
                <a href="{{ route('post.show', $featuredPost->slug) }}">
                    {{ $featuredPost->title }}
                </a>
            </h1>
            <p>{{ $featuredPost->excerpt }}</p>
        </div>
        @endif
    </div>
</section>

<section class="section">
    <div class="container blog-layout">
        <div>
            <div class="section-heading">
                <h2>Latest Articles</h2>
            </div>

            <div class="post-grid">
                @foreach($latestPosts as $post)
                <article class="post-card">
                    <div class="post-card-body">
                        <span class="post-category">{{ $post->category?->name }}</span>
                        <h3>
                            <a href="{{ route('post.show', $post->slug) }}">{{ $post->title }}</a>
                        </h3>
                        <p>{{ $post->excerpt }}</p>
                        <a href="{{ route('post.show', $post->slug) }}" class="read-more">Read More</a>
                    </div>
                </article>
                @endforeach
            </div>
        </div>

        @include('partials.sidebar')
    </div>
</section>
@endsection