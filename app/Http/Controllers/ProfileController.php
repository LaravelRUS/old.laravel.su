<?php

namespace App\Http\Controllers;

use App\Models\Post;
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
        $isMyAccount = $user->id === $request->user()?->id;

        $posts = $user->posts()
            ->withCount('comments')
            ->withCount('likers')
            ->orderBy('id', 'desc')
            ->CursorPaginate(2);
        $posts = $request->user()->attachLikeStatus($posts);

        if ($request->has('cursor')  && $posts->isEmpty())
        {
            return $posts->previousPageUrl() ? redirect($posts->previousPageUrl()) :
                redirect()->route('profile',$user);
        }

        return view('pages.profile.profile', [
            'user'        => $user,
            'isMyProfile' => $isMyAccount,
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

        if ($request->has('cursor')  && $comments->isEmpty())
        {
            return $comments->previousPageUrl() ? redirect($comments->previousPageUrl()) :
                redirect()->route('profile.comments',$user);
        }

        $isMyAccount = $user->id === Auth::user()?->id;
        return view(
            'pages.profile.comments',
            array_merge($data, [
                'comments' => $comments,
                'user'     => $user,
                'active'   => 'comments',
                'isMyProfile' => $isMyAccount
            ])
        );
    }

    public function awards(User $user, Request $request)
    {
        $isMyAccount = $user->id === $request->user()?->id;
        return view('pages.profile.awards', [
            'user'        => $user,
            'isMyProfile' => $isMyAccount,
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
        return view('pages.profile.edit', [
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
