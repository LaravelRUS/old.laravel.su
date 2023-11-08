<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    /**
     * @param \App\Models\Post $post
     * @param array            $data
     *
     * @return string
     */
    public function show(Post $post, array $data = [])
    {
        return view('components.comments', array_merge($data, [
            'model' => $post,
        ]))
            ->fragmentIf(!request()->isMethod('GET'), 'comments');
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return string
     */
    public function store(Request $request)
    {
        $this->authorize('create', Comment::class);

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
            'comment'  => $request->input('message'),
            'approved' => true,
        ])->save();

       return $this->show($model);
    }

    /**
     * @param \App\Models\Comment $comment
     *
     * @return string
     */
    public function showReply(Comment $comment)
    {
        return $this->show($comment->commentable, [
            'reply' => $comment->getKey(),
        ]);
    }

    /**
     * @param \App\Models\Comment $comment
     *
     * @return string
     */
    public function showEdit(Comment $comment)
    {
        return $this->show($comment->commentable, [
            'edit'  => $comment->getKey(),
        ]);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Comment      $comment
     *
     * @return string
     */
    public function reply(Request $request, Comment $comment)
    {
        $this->authorize('reply', $comment);

        $request->validate([
            'message' => 'required|string',
        ]);

        $reply = new Comment([
            'comment'  => $request->input('message'),
            'approved' => true,
        ]);

        $reply->commenter()->associate($request->user());
        $reply->commentable()->associate($comment->commentable);
        $reply->parent()->associate($comment);
        $reply->save();

        return $this->show($comment->commentable);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Comment      $comment
     *
     * @return string
     */
    public function update(Request $request, Comment $comment)
    {
        $this->authorize('update', $comment);

        $request->validate([
            'message' => 'required|string',
        ]);

        $comment->update([
            'comment' => $request->message,
        ]);

        return $this->show($comment->commentable);
    }

    /**
     * @param \App\Models\Comment $comment
     *
     * @return string
     */
    public function delete(Comment $comment)
    {
        $this->authorize('delete', $comment);

        $comment->children()->exists()
            ? $comment->delete()
            : $comment->forceDelete();

        return $this->show($comment->commentable);
    }
}
