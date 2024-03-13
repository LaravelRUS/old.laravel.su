<?php

namespace App\Http\Controllers;

use App\Models\Post;

class FeedController
{
    /**
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')
            ->take(10)
            ->get();

        return response()->view('pages.feed', ['posts' => $posts], 200, [
            'Content-Type' => 'application/xml;charset=UTF-8',
        ]);
    }
}
