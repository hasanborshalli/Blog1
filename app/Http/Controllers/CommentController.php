<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use App\Models\Setting;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Post $post)
    {
        $settings = Setting::first();

        if (!$settings?->comments_enabled) {
            return back()->with('error', 'Comments are currently disabled.');
        }

        if ($post->status !== 'published') {
            abort(404);
        }

        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'comment' => ['required', 'string', 'min:3'],
        ]);

        Comment::create([
            'post_id' => $post->id,
            'name' => $data['name'],
            'email' => $data['email'],
            'comment' => $data['comment'],
            'status' => 'pending',
        ]);

        return back()->with('success', 'Your comment has been submitted and is awaiting approval.');
    }
}