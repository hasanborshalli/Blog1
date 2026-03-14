@extends('admin.layouts.app')

@section('content')
<div class="admin-page-head">
    <h1>Dashboard</h1>
</div>

<div class="stats-grid">
    <div class="stat-card">
        <h3>Total Posts</h3>
        <p>{{ $stats['posts'] }}</p>
    </div>

    <div class="stat-card">
        <h3>Categories</h3>
        <p>{{ $stats['categories'] }}</p>
    </div>

    <div class="stat-card">
        <h3>Tags</h3>
        <p>{{ $stats['tags'] }}</p>
    </div>

    <div class="stat-card">
        <h3>Comments</h3>
        <p>{{ $stats['comments'] }}</p>
    </div>

    <div class="stat-card">
        <h3>Pending Comments</h3>
        <p>{{ $stats['pending_comments'] }}</p>
    </div>
</div>

<div class="admin-two-col">
    <section class="admin-card">
        <h2>Recent Posts</h2>

        <table class="admin-table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Status</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @forelse($recentPosts as $post)
                <tr>
                    <td>{{ $post->title }}</td>
                    <td>{{ ucfirst($post->status) }}</td>
                    <td>{{ $post->created_at->format('M d, Y') }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="3">No posts found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </section>

    <section class="admin-card">
        <h2>Recent Comments</h2>

        <table class="admin-table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @forelse($recentComments as $comment)
                <tr>
                    <td>{{ $comment->name }}</td>
                    <td>{{ ucfirst($comment->status) }}</td>
                    <td>{{ $comment->created_at->format('M d, Y') }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="3">No comments found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </section>
</div>
@endsection