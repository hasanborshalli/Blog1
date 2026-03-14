<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class AdminCommentController extends Controller
{
    public function index(Request $request)
    {
        $q = trim((string) $request->get('q'));

        $comments = Comment::with('post')
            ->when($q !== '', function ($query) use ($q) {
                $query->where(function ($sub) use ($q) {
                    $sub->where('name', 'like', "%{$q}%")
                        ->orWhere('email', 'like', "%{$q}%")
                        ->orWhere('comment', 'like', "%{$q}%")
                        ->orWhereHas('post', function ($postQuery) use ($q) {
                            $postQuery->where('title', 'like', "%{$q}%");
                        });
                });
            })
            ->latest()
            ->paginate(15)
            ->withQueryString();

        return view('admin.comments.index', compact('comments', 'q'));
    }

    public function show(Comment $comment)
    {
        $comment->load('post');

        return view('admin.comments.show', compact('comment'));
    }

    public function update(Request $request, Comment $comment)
    {
        $data = $request->validate([
            'status' => ['required', 'in:pending,approved,spam'],
        ]);

        $comment->update([
            'status' => $data['status'],
        ]);

        return redirect()
            ->route('admin.comments.show', $comment)
            ->with('success', 'Comment status updated successfully.');
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();

        return redirect()
            ->route('admin.comments.index')
            ->with('success', 'Comment deleted successfully.');
    }
}