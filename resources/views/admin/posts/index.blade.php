@extends('admin.layouts.app')

@section('content')
<div class="admin-page-head">
    <h1>Posts</h1>
    <a href="{{ route('admin.posts.create') }}" class="admin-link-btn">Add Post</a>
</div>

<div class="admin-card">
    <table class="admin-table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Category</th>
                <th>Status</th>
                <th>Featured</th>
                <th>Author</th>
                <th>Date</th>
                <th style="width: 180px;">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($posts as $post)
            <tr>
                <td>{{ $post->title }}</td>
                <td>{{ $post->category?->name ?? '—' }}</td>
                <td>{{ ucfirst($post->status) }}</td>
                <td>{{ $post->is_featured ? 'Yes' : 'No' }}</td>
                <td>{{ $post->author?->name ?? '—' }}</td>
                <td>{{ $post->created_at->format('M d, Y') }}</td>
                <td>
                    <div class="table-actions">
                        <a href="{{ route('admin.posts.edit', $post) }}" class="table-action edit">Edit</a>

                        <form method="POST" action="{{ route('admin.posts.destroy', $post) }}"
                            onsubmit="return confirm('Delete this post?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="table-action delete">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7">No posts found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="pagination-wrap">
        {{ $posts->links() }}
    </div>
</div>
@endsection