<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'post_id' => 'required|exists:posts,id',
            'body' => 'required|string',
        ]);

        $comment = Comment::create([
            'post_id' => $request->post_id,
            'user_id' => auth()->id(),
            'body' => $request->body,
        ]);

        if ($request->expectsJson()) {
            return response()->json($comment, 201);
        } else {
            return redirect()->back()->with('status', 'Comment added successfully.');
        }
    }

    public function update(Request $request, Comment $comment)
    {
        Gate::authorize('update', $comment);

        $request->validate([
            'body' => 'sometimes|string',
        ]);

        $comment->update($request->only('body'));

        if ($request->expectsJson()) {
            return response()->json($comment);
        } else {
            return redirect()->back()->with('status', 'Comment updated successfully.');
        }
    }

    public function destroy(Request $request, Comment $comment)
    {
        Gate::authorize('delete', $comment);
        $comment->delete();

        if ($request->expectsJson()) {
            return response()->json(null, 204);
        } else {
            return redirect()->back()->with('status', 'Comment deleted successfully.');
        }
    }
}
