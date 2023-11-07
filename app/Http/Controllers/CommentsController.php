<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentsController extends Controller
{

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function store(Request $request)
    {
        $request->validate([
            'commentable_type' => 'required|sometimes|string',
            'commentable_id'   => 'required|string|min:1',
            'message'          => 'required|string',
        ]);

        $model = $request->commentable_type::findOrFail($request->commentable_id);

        $comment = new Comment();

        $comment->commenter()->associate($request->user());

        $comment->commentable()->associate($model);

        $comment->fill([
            'comment' => $request->input('message'),
            'approved' => true,
        ])->save();

        return view('components.comments', [
            'model' => $model,
        ]);
    }


    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Comment      $comment
     *
     * @return \App\Models\Comment
     */
    public function reply(Request $request, Comment $comment)
    {
        $request->validate([
            'message' => 'required|string',
        ]);

        $reply = new Comment();
        $reply->commenter()->associate($request->user());
        $reply->commentable()->associate($comment->commentable);
        $reply->parent()->associate($comment);

        $comment->fill([
            'comment' => $request->input('message'),
            'approved' => true,
        ])->save();

        return $reply;
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Comment      $comment
     *
     * @return \App\Models\Comment
     */
    public function update(Request $request, Comment $comment)
    {
        $request->validate([
            'message' => 'required|string',
        ]);

        $comment->update([
            'comment' => $request->message,
        ]);

        return $comment;
    }

    /**
     * @param \App\Models\Comment $comment
     *
     * @return void
     */
    public function destroy(Comment $comment): void
    {
        $comment->delete();
    }
}
