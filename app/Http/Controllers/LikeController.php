<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class LikeController
{
    /**
     * @param \App\Models\Post         $post
     * @param \Illuminate\Http\Request $request
     *
     * @return string
     */
    public function togglePost(Post $post, Request $request)
    {
        $request->user()->toggleLike($post);

        return turbo_stream()
            ->target(dom_id($post, 'like'))
            ->action('replace')
            ->view('particles.streams.like', ['model' => $post]);
    }

    /**
     * @param \App\Models\Comment      $comment
     * @param \Illuminate\Http\Request $request
     *
     * @return string
     */
    public function toggleComment(Comment $comment, Request $request)
    {
        $request->user()->toggleLike($comment);

        return turbo_stream()
            ->target(dom_id($comment, 'like'))
            ->action('replace')
            ->view('particles.streams.like', ['model' => $comment]);
    }
}
