<?php

namespace App\Http\Controllers;

use App\Models\Post;
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
        $isMyAccount = $user->id === $request->user()?->id;

        $posts = $user->load('posts')
            ->orderBy('id', 'desc')
            ->simplePaginate(5);

        return view('pages.profile.profile', [
            'user'        => $user,
            'isMyAccount' => $isMyAccount,
            'posts'       => $posts,
            'active'      => 'posts'
        ]);
    }

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

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return string
     */
    public function postTab(Request $request, User $user)
    {
        return view('pages.profile.tabs.posts-tab', [
            'user'        => $user,
            'active'      => 'posts'
        ])->fragmentsIf(!$request->isMethodSafe());
    }

    public function commentsTab(User $user, array $data = [])
    {
        return view(
            'pages.profile.tabs.comments-tab',
            array_merge($data, [
                'user'   => $user,
                'active' => 'comments'
            ])
        )
            ->fragmentIf(!request()->isMethod('GET'), 'comments');
    }
}
