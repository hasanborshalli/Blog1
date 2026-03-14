<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $metaTitle ?? ($settings->site_name ?? 'My Blog') }}</title>
    <meta name="description"
        content="{{ $metaDescription ?? ($settings->meta_description ?? 'Modern Laravel blog template') }}">
    <link rel="stylesheet" href="{{ asset('css/blog.css') }}">
</head>

<body>
    @include('partials.navbar')

    <main>
        @yield('content')
    </main>

    @include('partials.footer')
</body>

</html>