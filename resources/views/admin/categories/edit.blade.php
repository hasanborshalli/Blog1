@extends('admin.layouts.app')

@section('content')
<div class="admin-page-head">
    <h1>Edit Category</h1>
</div>

<div class="admin-card">
    <form method="POST" action="{{ route('admin.categories.update', $category) }}">
        @csrf
        @method('PUT')
        @include('admin.categories._form')
        <button type="submit" class="admin-link-btn">Update Category</button>
    </form>
</div>
@endsection