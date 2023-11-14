<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\User;

class ProfileCommentsController extends Controller
{
    /**
     * @param \App\Models\User $user
     * @param array            $data
     *
     * @return string
     */
    public function show(User $user, array $data = [])
    {
        return view(
            'pages.profile.tabs.comments-tab',
            array_merge($data, [
                'comments' => $user->comments()->latest()->get(),
                'user'     => $user,
                'active'   => 'comments'
            ])
        )->fragmentIf(!request()->isMethod('GET'), 'comments');
    }


    /**
     * @param \App\Models\Comment $comment
     *
     * @return string
     */
    public function showEdit(Comment $comment)
    {
        return $this->show($comment->commenter, [
            'edit' => $comment->getKey(),
        ]);
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

        return $this->show($comment->commenter);
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

        return $this->show($comment->commenter);
    }

}
