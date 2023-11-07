<?php

namespace App\Policies;

use App\Models\Comment;
use App\Models\User;

class CommentPolicy
{
    /**
     * Can user create the comment
     *
     * @param \App\Models\User $user
     *
     * @return bool
     */
    public function create(User $user) : bool
    {
        return true;
    }

    /**
     * Can user delete the comment
     *
     * @param \App\Models\User $user
     * @param Comment          $comment
     *
     * @return bool
     */
    public function delete(User $user, Comment $comment) : bool
    {
        return $user->getKey() == $comment->commenter_id;
    }

    /**
     * Can user update the comment
     *
     * @param \App\Models\User $user
     * @param Comment          $comment
     *
     * @return bool
     */
    public function update(User $user, Comment $comment) : bool
    {
        return $user->getKey() == $comment->commenter_id;
    }

    /**
     * Can user reply to the comment
     *
     * @param \App\Models\User $user
     * @param Comment          $comment
     *
     * @return bool
     */
    public function reply(User $user, Comment $comment) : bool
    {
        // Ned also check deep!
        return $user->getKey() != $comment->commenter_id;
    }
}
