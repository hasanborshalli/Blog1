<footer class="site-footer">
    <div class="container footer-grid">
        <div>
            <h3>{{ $settings->site_name ?? 'My Blog' }}</h3>
            <p>{{ $settings->tagline ?? 'A modern Laravel blog template' }}</p>
        </div>

        <div>
            <h4>Links</h4>
            <ul>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('blog.index') }}">Blog</a></li>
                <li><a href="{{ route('about') }}">About</a></li>
                <li><a href="{{ route('contact.index') }}">Contact</a></li>
            </ul>
        </div>

        <div>
            <h4>Contact</h4>
            <p>{{ $settings->contact_email }}</p>
            <p>{{ $settings->contact_phone }}</p>
        </div>
    </div>

    <div class="container footer-bottom">
        <p>{{ $settings->footer_text ?? '© '.date('Y').' My Blog. All rights reserved.' }}</p>
        <a href="https://brndnglb.com" target="_blank">
            <p>Powered by <strong>Brndng.</strong></p>
        </a>
    </div>
</footer>