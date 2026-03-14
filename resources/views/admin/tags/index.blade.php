@extends('admin.layouts.app')

@section('content')
<div class="admin-page-head">
    <h1>Tags</h1>
    <a href="{{ route('admin.tags.create') }}" class="admin-link-btn">Add Tag</a>
</div>

<div class="admin-card">
    <table class="admin-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Slug</th>
                <th>Posts</th>
                <th style="width: 180px;">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($tags as $tag)
            <tr>
                <td>{{ $tag->name }}</td>
                <td>{{ $tag->slug }}</td>
                <td>{{ $tag->posts_count }}</td>
                <td>
                    <div class="table-actions">
                        <a href="{{ route('admin.tags.edit', $tag) }}" class="table-action edit">Edit</a>

                        <form method="POST" action="{{ route('admin.tags.destroy', $tag) }}"
                            onsubmit="return confirm('Delete this tag?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="table-action delete">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4">No tags found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="pagination-wrap">
        {{ $tags->links() }}
    </div>
</div>
@endsection