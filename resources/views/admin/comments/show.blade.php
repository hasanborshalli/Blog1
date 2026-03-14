@extends('admin.layouts.app')

@section('content')
<div class="admin-page-head">
    <h1>Comment Details</h1>
    <a href="{{ route('admin.comments.index') }}" class="admin-link-btn secondary">Back to Comments</a>
</div>

<div class="admin-card comment-detail-card">
    <div class="comment-detail-grid">
        <div class="detail-block">
            <h3>Name</h3>
            <p>{{ $comment->name }}</p>
        </div>

        <div class="detail-block">
            <h3>Email</h3>
            <p>{{ $comment->email }}</p>
        </div>

        <div class="detail-block">
            <h3>Status</h3>
            <p>
                <span class="status-badge status-{{ $comment->status }}">
                    {{ ucfirst($comment->status) }}
                </span>
            </p>
        </div>

        <div class="detail-block">
            <h3>Date</h3>
            <p>{{ $comment->created_at->format('M d, Y h:i A') }}</p>
        </div>

        <div class="detail-block full">
            <h3>Post</h3>
            @if($comment->post)
            <p>
                <a href="{{ route('post.show', $comment->post->slug) }}" target="_blank">
                    {{ $comment->post->title }}
                </a>
            </p>
            @else
            <p>—</p>
            @endif
        </div>

        <div class="detail-block full">
            <h3>Comment</h3>
            <div class="full-comment-box">
                {{ $comment->comment }}
            </div>
        </div>
    </div>
</div>

<div class="admin-card">
    <h2>Actions</h2>

    <div class="comment-actions-grid">
        <form method="POST" action="{{ route('admin.comments.update', $comment) }}">
            @csrf
            @method('PUT')
            <input type="hidden" name="status" value="approved">
            <button type="submit" class="admin-action-btn approve">Approve</button>
        </form>

        <form method="POST" action="{{ route('admin.comments.update', $comment) }}">
            @csrf
            @method('PUT')
            <input type="hidden" name="status" value="pending">
            <button type="submit" class="admin-action-btn pending">Mark Pending</button>
        </form>

        <form method="POST" action="{{ route('admin.comments.update', $comment) }}">
            @csrf
            @method('PUT')
            <input type="hidden" name="status" value="spam">
            <button type="submit" class="admin-action-btn spam">Mark Spam</button>
        </form>

        <form method="POST" action="{{ route('admin.comments.destroy', $comment) }}"
            onsubmit="return confirm('Delete this comment?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="admin-action-btn delete">Delete Comment</button>
        </form>
    </div>
</div>
@endsection