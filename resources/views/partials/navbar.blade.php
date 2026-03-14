<header class="site-header">
    <div class="container nav-wrap">
        <a href="{{ route('home') }}" class="brand">
            {{ $settings->site_name ?? 'My Blog' }}
        </a>

        <nav class="nav-links">
            <a href="{{ route('home') }}">Home</a>
            <a href="{{ route('blog.index') }}">Blog</a>
            <a href="{{ route('about') }}">About</a>
            <a href="{{ route('contact.index') }}">Contact</a>
        </nav>
    </div>
</header>