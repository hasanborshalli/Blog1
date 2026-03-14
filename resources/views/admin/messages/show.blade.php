@extends('admin.layouts.app')

@section('content')
<div class="admin-page-head">
    <h1>Message Details</h1>
    <a href="{{ route('admin.messages.index') }}" class="admin-link-btn secondary">Back to Messages</a>
</div>

<div class="admin-card comment-detail-card">
    <div class="comment-detail-grid">
        <div class="detail-block">
            <h3>Name</h3>
            <p>{{ $message->name }}</p>
        </div>

        <div class="detail-block">
            <h3>Email</h3>
            <p>{{ $message->email }}</p>
        </div>

        <div class="detail-block">
            <h3>Status</h3>
            <p>
                @if($message->is_read)
                <span class="status-badge status-approved">Read</span>
                @else
                <span class="status-badge status-pending">Unread</span>
                @endif
            </p>
        </div>

        <div class="detail-block">
            <h3>Date</h3>
            <p>{{ $message->created_at->format('M d, Y h:i A') }}</p>
        </div>

        <div class="detail-block full">
            <h3>Subject</h3>
            <p>{{ $message->subject ?: '—' }}</p>
        </div>

        <div class="detail-block full">
            <h3>Message</h3>
            <div class="full-comment-box">
                {{ $message->message }}
            </div>
        </div>
    </div>
</div>

<div class="admin-card">
    <h2>Actions</h2>

    <div class="comment-actions-grid">
        <form method="POST" action="{{ route('admin.messages.update', $message) }}">
            @csrf
            @method('PUT')
            <input type="hidden" name="is_read" value="1">
            <button type="submit" class="admin-action-btn approve">Mark as Read</button>
        </form>

        <form method="POST" action="{{ route('admin.messages.update', $message) }}">
            @csrf
            @method('PUT')
            <input type="hidden" name="is_read" value="0">
            <button type="submit" class="admin-action-btn pending">Mark as Unread</button>
        </form>

        <form method="POST" action="{{ route('admin.messages.destroy', $message) }}"
            onsubmit="return confirm('Delete this message?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="admin-action-btn delete">Delete Message</button>
        </form>
    </div>
</div>
@endsection