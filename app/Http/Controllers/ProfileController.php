<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * @param \App\Models\User         $user
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function show(User $user, Request $request)
    {
        $isMyAccount = $user->id === $request->user()->id;

        $posts = $user->load('posts')
            ->orderBy('id', 'desc')
            ->simplePaginate(5);

        return view('pages.profile', [
            'user'        => $user,
            'isMyAccount' => $isMyAccount,
            'posts'       => $posts,
        ]);
    }
}
