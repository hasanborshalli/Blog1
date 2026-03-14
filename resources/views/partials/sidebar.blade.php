<aside class="blog-sidebar">
    <div class="sidebar-card">
        <form action="{{ route('search') }}" method="GET">
            <input type="text" name="q" placeholder="Search articles..." value="{{ request('q') }}">
            <button type="submit">Search</button>
        </form>
    </div>

    <div class="sidebar-card">
        <h3>Categories</h3>
        <ul>
            @foreach($categories as $category)
            <li>
                <a href="{{ route('category.show', $category->slug) }}">
                    {{ $category->name }} ({{ $category->posts_count }})
                </a>
            </li>
            @endforeach
        </ul>
    </div>

    <div class="sidebar-card">
        <h3>Recent Posts</h3>
        <ul>
            @foreach($recentPosts as $recentPost)
            <li>
                <a href="{{ route('post.show', $recentPost->slug) }}">
                    {{ $recentPost->title }}
                </a>
            </li>
            @endforeach
        </ul>
    </div>

    <div class="sidebar-card">
        <h3>Tags</h3>
        <div class="tag-list">
            @foreach($tags as $tag)
            <span>{{ $tag->name }}</span>
            @endforeach
        </div>
    </div>
</aside>