@extends('layouts.app')

@section('content')
<section class="section">
    <div class="container blog-layout">
        <article class="single-post">
            <span class="post-category">{{ $post->category?->name }}</span>
            <h1>{{ $post->title }}</h1>

            <div class="post-meta">
                <span>By {{ $post->author?->name }}</span>
                <span>{{ optional($post->published_at)->format('M d, Y') }}</span>
                <span>{{ $post->views }} views</span>
            </div>

            <div class="post-content">
                {!! nl2br(e($post->content)) !!}
            </div>

            @if($post->tags->count())
            <div class="tag-list post-tags">
                @foreach($post->tags as $tag)
                <span>{{ $tag->name }}</span>
                @endforeach
            </div>
            @endif

            @if($relatedPosts->count())
            <div class="related-posts">
                <h3>Related Posts</h3>
                @foreach($relatedPosts as $related)
                <div class="related-item">
                    <a href="{{ route('post.show', $related->slug) }}">{{ $related->title }}</a>
                </div>
                @endforeach
            </div>
            @endif

            @if($settings?->comments_enabled)
            <div class="comments-section">
                <h3>Comments ({{ $post->approvedComments->count() }})</h3>

                @if(session('success'))
                <div class="success-box">{{ session('success') }}</div>
                @endif

                @if(session('error'))
                <div class="error-box">{{ session('error') }}</div>
                @endif

                @foreach($errors->all() as $error)
                <div class="error-box">{{ $error }}</div>
                @endforeach

                @if($post->approvedComments->count())
                <div class="comments-list">
                    @foreach($post->approvedComments as $comment)
                    <div class="comment-card">
                        <div class="comment-head">
                            <strong>{{ $comment->name }}</strong>
                            <span>{{ $comment->created_at->format('M d, Y') }}</span>
                        </div>
                        <p>{{ $comment->comment }}</p>
                    </div>
                    @endforeach
                </div>
                @else
                <p class="muted-text">No comments yet. Be the first to comment.</p>
                @endif

                <div class="comment-form-wrap">
                    <h4>Leave a Comment</h4>

                    <form method="POST" action="{{ route('comment.store', $post) }}" class="comment-form">
                        @csrf

                        <input type="text" name="name" placeholder="Your Name" value="{{ old('name') }}" required>

                        <input type="email" name="email" placeholder="Your Email" value="{{ old('email') }}" required>

                        <textarea name="comment" rows="5" placeholder="Write your comment..."
                            required>{{ old('comment') }}</textarea>

                        <button type="submit">Submit Comment</button>
                    </form>
                </div>
            </div>
            @endif
        </article>

        @include('partials.sidebar')
    </div>
</section>
@endsection