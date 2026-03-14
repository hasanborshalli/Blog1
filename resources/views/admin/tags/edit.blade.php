@extends('admin.layouts.app')

@section('content')
<div class="admin-page-head">
    <h1>Edit Tag</h1>
</div>

<div class="admin-card">
    <form method="POST" action="{{ route('admin.tags.update', $tag) }}">
        @csrf
        @method('PUT')
        @include('admin.tags._form')
        <button type="submit" class="admin-link-btn">Update Tag</button>
    </form>
</div>
@endsection