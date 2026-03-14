@extends('admin.layouts.app')

@section('content')
<div class="admin-page-head">
    <h1>Edit Post</h1>
</div>

<div class="admin-card">
    <form method="POST" action="{{ route('admin.posts.update', $post) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @include('admin.posts._form')
        <button type="submit" class="admin-link-btn">Update Post</button>
    </form>
</div>
@endsection