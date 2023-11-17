<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProfileCommentsController extends Controller
{
    public string $action = 'append';

    /**
     * @param \App\Models\User $user
     * @param array            $data
     *
     * @return string
     */
    public function show(Request $request, User $user, array $data = [])
    {
        $comments = $this->getComments($user);
        $comments->withPath('/profile/'.$user->nickname.'/comments');

        if ($request->get('page') > 1 && $comments->isEmpty())
        {
            $request->merge([
                'page' => $comments->lastPage(),
            ]);
            $comments = $this->getComments($user);
        }

        $isMyAccount = $user->id === Auth::user()?->id;
        return view(
            'pages.profile.tabs.comments-tab',
            array_merge($data, [
                'comments' => $comments,
                'user'     => $user,
                'active'   => 'comments',
                'action'    => $this->action,
                'isMyAccount' => $isMyAccount
            ])
        )->fragmentsIf(!request()->isMethod('GET'));
    }

    protected function getComments(User $user){
        return $comments = $user->comments()
            ->orderBy('id', 'desc')
            ->paginate(2);;
    }

    /**
     * @param \App\Models\Comment $comment
     *
     * @return string
     */
    public function showEdit(Request $request,Comment $comment)
    {
        return $this->show($request,$comment->commenter, [
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

        return $this->show($request,$comment->commenter);
    }

    /**
     * @param \App\Models\Comment $comment
     *
     * @return string
     */
    public function delete(Request $request, Comment $comment)
    {
        $this->authorize('delete', $comment);

        $comment->children()->exists()
            ? $comment->delete()
            : $comment->forceDelete();

        return $this->show($request,$comment->commenter);
    }

}
