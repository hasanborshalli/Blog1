@extends('admin.layouts.app')

@section('content')
<div class="admin-page-head">
    <h1>Comments</h1>
</div>

<div class="admin-card">
    <form method="GET" action="{{ route('admin.comments.index') }}" class="admin-search-form">
        <input type="text" name="q" value="{{ $q }}" placeholder="Search by name, email, comment, or post title">
        <button type="submit" class="admin-link-btn">Search</button>
    </form>
</div>

<div class="admin-card">
    <table class="admin-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Post</th>
                <th>Comment</th>
                <th>Status</th>
                <th>Date</th>
                <th style="width: 120px;">View</th>
            </tr>
        </thead>
        <tbody>
            @forelse($comments as $comment)
            <tr>
                <td>{{ $comment->name }}</td>
                <td>{{ $comment->email }}</td>
                <td>
                    @if($comment->post)
                    <a href="{{ route('post.show', $comment->post->slug) }}" target="_blank">
                        {{ $comment->post->title }}
                    </a>
                    @else
                    —
                    @endif
                </td>
                <td>{{ \Illuminate\Support\Str::limit($comment->comment, 80) }}</td>
                <td>
                    <span class="status-badge status-{{ $comment->status }}">
                        {{ ucfirst($comment->status) }}
                    </span>
                </td>
                <td>{{ $comment->created_at->format('M d, Y') }}</td>
                <td>
                    <a href="{{ route('admin.comments.show', $comment) }}" class="table-action edit">
                        View
                    </a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7">No comments found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="pagination-wrap">
        {{ $comments->links() }}
    </div>
</div>
@endsection