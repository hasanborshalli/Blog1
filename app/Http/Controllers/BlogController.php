<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Setting;

class BlogController extends Controller
{
    public function index()
    {
        $settings = Setting::first();

        $posts = Post::with(['category', 'author', 'tags'])
            ->where('status', 'published')
            ->latest('published_at')
            ->paginate($settings?->posts_per_page ?? 9);

        $categories = Category::where('is_active', true)->withCount('posts')->get();
        $recentPosts = Post::where('status', 'published')->latest('published_at')->take(5)->get();
        $tags = Tag::orderBy('name')->get();

        return view('blog.index', compact('settings', 'posts', 'categories', 'recentPosts', 'tags'));
    }
}