<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Tag;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'posts' => Post::count(),
            'categories' => Category::count(),
            'tags' => Tag::count(),
            'comments' => Comment::count(),
            'pending_comments' => Comment::where('status', 'pending')->count(),
        ];

        $recentPosts = Post::latest()->take(5)->get();
        $recentComments = Comment::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recentPosts', 'recentComments'));
    }
}