<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Setting;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $settings = Setting::first();
        $q = trim((string) $request->get('q'));

        $posts = Post::with(['category', 'author'])
            ->where('status', 'published')
            ->when($q !== '', function ($query) use ($q) {
                $query->where(function ($sub) use ($q) {
                    $sub->where('title', 'like', "%{$q}%")
                        ->orWhere('excerpt', 'like', "%{$q}%")
                        ->orWhere('content', 'like', "%{$q}%");
                });
            })
            ->latest('published_at')
            ->paginate($settings?->posts_per_page ?? 9)
            ->withQueryString();

        $categories = Category::where('is_active', true)->withCount('posts')->get();
        $recentPosts = Post::where('status', 'published')->latest('published_at')->take(5)->get();
        $tags = Tag::orderBy('name')->get();

        return view('blog.search', compact('settings', 'posts', 'q', 'categories', 'recentPosts', 'tags'));
    }
}