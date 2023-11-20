<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        return $this->show($request->user(), $request);
    }

    /**
     * @param \App\Models\User         $user
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function show(User $user, Request $request)
    {
        $posts = $user->posts()
            ->withCount('comments')
            ->withCount('likers')
            ->orderBy('id', 'desc')
            ->cursorPaginate(2);

        $posts = $request->user()->attachLikeStatus($posts);

        return view('profile.profile', [
            'user'        => $user,
            'posts'       => $posts,
            'active'      => 'posts'
        ]);
    }

    public function comments(Request $request, User $user, array $data = [])
    {
        $comments =  $user->comments()
            ->withCount('likers')
            ->orderBy('id', 'desc')
            ->cursorPaginate(2);
        $comments->withPath('/profile/'.$user->nickname.'/comments');
        $comments = $request->user()->attachLikeStatus($comments);

        return view(
            'profile.comments',
            array_merge($data, [
                'comments' => $comments,
                'user'     => $user,
                'active'   => 'comments',
            ])
        );
    }

    public function awards(User $user)
    {
        return view('profile.awards', [
            'user'        => $user,
            'active'      => 'awards'
        ]);
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|null
     */
    public function edit(Request $request)
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    public function update(Request $request)
    {
        $request->validate(
            [
                'name'  => 'required|string',
                'about' => 'sometimes|string'
            ],
            [],
            [

                'name'  => 'Имя',
                'about' => 'О себе'
            ]
        );

        $request->user()->fill([
            'name'  => $request->input('name'),
            'about' => $request->input('about')
        ])->save();
        return $this->edit($request)->fragment('profile');
    }

}
