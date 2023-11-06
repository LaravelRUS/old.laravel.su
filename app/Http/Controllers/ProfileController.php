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

        return view('pages.profile.profile', [
            'user'        => $user,
            'isMyAccount' => $isMyAccount,
            'posts'       => $posts,
        ]);
    }

    public function edit(Request $request){

        return view('pages.profile.edit', [
            'user'        => $request->user(),
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'about'=> 'required|string'
        ],
            [],
            [

                'name'             => 'Имя',
                'about' => 'О себе'
            ]);

        $request->user()->fill([
            'name'  => $request->input('name'),
            'about' => $request->input('about')
        ])->save();
        return $this->edit($request)->fragment('profile');
    }
}
