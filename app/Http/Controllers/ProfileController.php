<?php

namespace App\Http\Controllers;

use App\Casts\PostTypeEnum;
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
        return view('profile.profile', [
            'user'        => $user,
            'posts'       => $this->getPosts($user, PostTypeEnum::Article, $request->user()),
        ]);
    }

    private function getPosts(User $owner, PostTypeEnum $type, User $user){
        $posts =  $owner->posts()
            ->type($type->value)
            ->withCount('comments')
            ->withCount('likers')
            ->orderBy('id', 'desc')
            ->cursorPaginate(2);
        return $user->attachLikeStatus($posts);
    }

    public function events(User $user, Request $request)
    {
        $meets = $user->meets()->latest()
            ->cursorPaginate(2);
        return view('profile.events', [
            'user'        => $user,
            'meets'       => $meets,
        ]);
    }


    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\User         $user
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function packages(User $user)
    {

        $packages = $user->packages()->orderBy('stars', 'desc')
            ->cursorPaginate(2);

        return view('profile.packages', [
            'packages' => $packages,
            'user'     => $user,
        ]);
    }


    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\User         $user
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function comments(Request $request, User $user)
    {
        $comments = $user->comments()
            ->withCount('likers')
            ->orderBy('id', 'desc')
            ->cursorPaginate(2);

        $comments = $request->user()->attachLikeStatus($comments);

        return view('profile.comments', [
            'comments' => $comments,
            'user'     => $user,
        ]);
    }

    public function awards(User $user)
    {
        return view('profile.awards', [
            'user'        => $user,
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

        return redirect()->route('profile', $request->user());
    }

}
