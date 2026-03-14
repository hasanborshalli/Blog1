@extends('admin.layouts.app')

@section('content')
<div class="admin-page-head">
    <h1>Categories</h1>
    <a href="{{ route('admin.categories.create') }}" class="admin-link-btn">Add Category</a>
</div>

<div class="admin-card">
    <table class="admin-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Slug</th>
                <th>Posts</th>
                <th>Active</th>
                <th style="width: 180px;">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($categories as $category)
            <tr>
                <td>{{ $category->name }}</td>
                <td>{{ $category->slug }}</td>
                <td>{{ $category->posts_count }}</td>
                <td>{{ $category->is_active ? 'Yes' : 'No' }}</td>
                <td>
                    <div class="table-actions">
                        <a href="{{ route('admin.categories.edit', $category) }}" class="table-action edit">Edit</a>

                        <form method="POST" action="{{ route('admin.categories.destroy', $category) }}"
                            onsubmit="return confirm('Delete this category?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="table-action delete">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5">No categories found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="pagination-wrap">
        {{ $categories->links() }}
    </div>
</div>
@endsection