<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Setting;

class CategoryController extends Controller
{
    public function show($slug)
    {
        $settings = Setting::first();

        $category = Category::where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        $posts = Post::with(['category', 'author'])
            ->where('status', 'published')
            ->where('category_id', $category->id)
            ->latest('published_at')
            ->paginate($settings?->posts_per_page ?? 9);

        $categories = Category::where('is_active', true)->withCount('posts')->get();
        $recentPosts = Post::where('status', 'published')->latest('published_at')->take(5)->get();
        $tags = Tag::orderBy('name')->get();

        return view('blog.category', compact(
            'settings',
            'category',
            'posts',
            'categories',
            'recentPosts',
            'tags'
        ));
    }
}