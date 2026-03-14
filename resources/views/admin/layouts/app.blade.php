<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="{{ asset('css/admin-blog.css') }}">
</head>

<body>
    <div class="admin-shell">
        <aside class="admin-sidebar">
            <div class="admin-brand">
                <h2>Blog Admin</h2>
            </div>

            <nav class="admin-nav">
                <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                <a href="{{ route('admin.posts.index') }}">Posts</a>
                <a href="{{ route('admin.categories.index') }}">Categories</a>
                <a href="{{ route('admin.tags.index') }}">Tags</a>
                <a href="{{ route('admin.comments.index') }}">Comments</a>
                <a href="{{ route('admin.settings.edit') }}">Settings</a>
                <a href="{{ route('home') }}" target="_blank">View Website</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="admin-logout-btn">Logout</button>
                </form>
            </nav>
        </aside>

        <main class="admin-main">
            @if(session('success'))
            <div class="admin-alert success">{{ session('success') }}</div>
            @endif

            @if($errors->any())
            <div class="admin-alert error">
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            @yield('content')
        </main>
    </div>
</body>

</html>