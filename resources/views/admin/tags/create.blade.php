@extends('admin.layouts.app')

@section('content')
<div class="admin-page-head">
    <h1>Create Tag</h1>
</div>

<div class="admin-card">
    <form method="POST" action="{{ route('admin.tags.store') }}">
        @csrf
        @include('admin.tags._form')
        <button type="submit" class="admin-link-btn">Save Tag</button>
    </form>
</div>
@endsection