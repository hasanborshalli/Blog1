@extends('layouts.app')

@section('content')
<section class="page-heading">
    <div class="container">
        <h1>{{ $category->name }}</h1>
    </div>
</section>

<section class="section">
    <div class="container blog-layout">
        <div>
            <div class="post-grid">
                @forelse($posts as $post)
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
                @empty
                <p>No posts found in this category.</p>
                @endforelse
            </div>

            <div class="pagination-wrap">
                {{ $posts->links() }}
            </div>
        </div>

        @include('partials.sidebar')
    </div>
</section>
@endsection