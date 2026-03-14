<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Setting;

class PostController extends Controller
{
    public function show($slug)
    {
        $settings = Setting::first();

        $post = Post::with(['category', 'author', 'tags', 'approvedComments'])
            ->where('slug', $slug)
            ->where('status', 'published')
            ->firstOrFail();

        $post->increment('views');

        $relatedPosts = Post::with(['category', 'author'])
            ->where('status', 'published')
            ->where('id', '!=', $post->id)
            ->where('category_id', $post->category_id)
            ->latest('published_at')
            ->take(3)
            ->get();

        $categories = Category::where('is_active', true)->withCount('posts')->get();
        $recentPosts = Post::where('status', 'published')->latest('published_at')->take(5)->get();
        $tags = Tag::orderBy('name')->get();

        return view('blog.show', compact(
            'settings',
            'post',
            'relatedPosts',
            'categories',
            'recentPosts',
            'tags'
        ));
    }
}