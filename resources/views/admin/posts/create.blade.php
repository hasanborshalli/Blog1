@extends('admin.layouts.app')

@section('content')
<div class="admin-page-head">
    <h1>Create Post</h1>
</div>

<div class="admin-card">
    <form method="POST" action="{{ route('admin.posts.store') }}" enctype="multipart/form-data">
        @csrf
        @include('admin.posts._form')
        <button type="submit" class="admin-link-btn">Save Post</button>
    </form>
</div>
@endsection