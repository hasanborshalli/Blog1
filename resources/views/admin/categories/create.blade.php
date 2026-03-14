@extends('admin.layouts.app')

@section('content')
<div class="admin-page-head">
    <h1>Create Category</h1>
</div>

<div class="admin-card">
    <form method="POST" action="{{ route('admin.categories.store') }}">
        @csrf
        @include('admin.categories._form')
        <button type="submit" class="admin-link-btn">Save Category</button>
    </form>
</div>
@endsection