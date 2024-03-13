<?php

namespace App\Policies;

use App\Models\Comment;
use App\Models\User;

class CommentPolicy
{
    /**
     * @param \App\Models\User $user
     * @param string           $ability
     *
     * @return bool|null
     */
    public function before(User $user, string $ability): ?bool
    {
        if ($user->banned) {
            return false;
        }

        return null;
    }

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Comment $comment): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Comment $comment): bool
    {
        return $user->getKey() == $comment->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Comment $comment): bool
    {
        if ($user->hasAccess('site.content')) {
            return true;
        }

        return $user->getKey() == $comment->user_id;
    }

    /**
     * Can user reply to the comment
     *
     * @param \App\Models\User $user
     * @param Comment          $comment
     *
     * @return bool
     */
    public function reply(User $user, Comment $comment): bool
    {
        return $user->getKey() != $comment->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Comment $comment): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Comment $comment): bool
    {
        //
    }
}
