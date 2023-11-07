<?php

namespace App\Models\Concerns;

use App\Models\Comment;

/**
 * Add this trait to any model that you want to be able to
 * comment upon or get comments for.
 */
trait HasComments
{
    /**
     * This static method does voodoo magic to
     * delete leftover comments once the commentable
     * model is deleted.
     */
    protected static function bootHasComments()
    {
        static::deleted(function ($commentable) {
            $commentable->comments->every->delete();
            /*
            foreach ($commentable->comments as $comment) {
                $comment->delete();
            }*/
        });
    }

    /**
     * Returns all comments for this model.
     */
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    /**
     * Returns only approved comments for this model.
     */
    public function approvedComments()
    {
        return $this->morphMany(Comment::class, 'commentable')->where('approved', true);
    }
}
