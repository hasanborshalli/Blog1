<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\Setting;
use App\Models\Tag;

class HomeController extends Controller
{
    public function index()
    {
        $settings = Setting::first();

        $featuredPost = Post::with(['category', 'author'])
            ->where('status', 'published')
            ->where('is_featured', true)
            ->latest('published_at')
            ->first();

        $latestPosts = Post::with(['category', 'author'])
            ->where('status', 'published')
            ->latest('published_at')
            ->take(6)
            ->get();

        $popularPosts = Post::with(['category', 'author'])
            ->where('status', 'published')
            ->orderByDesc('views')
            ->take(5)
            ->get();

        $categories = Category::where('is_active', true)->withCount('posts')->get();
        $recentPosts = Post::where('status', 'published')->latest('published_at')->take(5)->get();
        $tags = Tag::orderBy('name')->get();
        return view('blog.home', compact(
            'settings',
            'featuredPost',
            'latestPosts',
            'popularPosts',
            'categories',
            'tags',
            'recentPosts',
        ));
    }
}