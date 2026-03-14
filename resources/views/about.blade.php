@extends('layouts.app')

@section('content')
<section class="page-heading">
    <div class="container">
        <h1>About</h1>
    </div>
</section>

<section class="section">
    <div class="container narrow-container">
        <p>{{ $settings->about_text ?? 'About page content goes here.' }}</p>
    </div>
</section>
@endsection