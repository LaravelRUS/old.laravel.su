<?php

namespace App\Http\Controllers;

use App\Models\Enums\PostTypeEnum;
use App\Models\User;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Orchid\Support\Facades\Toast;

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
        $user->load('achievements');

        return view('profile.profile', [
            'user'  => $user,
            'posts' => $this->getPosts($user, PostTypeEnum::Article, $request->user()),
        ]);
    }

    /**
     * @param \App\Models\User               $owner
     * @param \App\Models\Enums\PostTypeEnum $type
     * @param \App\Models\User|null          $user
     *
     * @return \Illuminate\Pagination\AbstractCursorPaginator|\Illuminate\Pagination\AbstractPaginator
     */
    private function getPosts(User $owner, PostTypeEnum $type, ?User $user)
    {
        $posts = $owner->posts()
            ->type($type->value)
            ->withCount('comments')
            ->withCount('likers')
            ->orderBy('id', 'desc')
            ->cursorPaginate(2);

        $user?->attachLikeStatus($posts);

        return $posts;
    }

    public function meets(User $user, Request $request)
    {
        $meets = $user->meets()->latest()
            ->cursorPaginate(2);

        return view('profile.events', [
            'user'  => $user,
            'meets' => $meets,
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
        $packages = $user->packages()
            ->orderBy('stars', 'desc')
            ->orderBy('created_at', 'desc')// нужно для курсора
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

        $request->user()?->attachLikeStatus($comments);

        return view('profile.comments', [
            'comments' => $comments,
            'user'     => $user,
        ]);
    }

    public function awards(User $user)
    {
        return view('profile.awards', [
            'user' => $user,
        ]);
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|null
     */
    public function edit(Request $request)
    {
        $user = $request->user();

        $user->load('achievements');

        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'name'                 => 'required|string|max:100',
            'about'                => 'sometimes|string|max:280|nullable',
            'selected_achievement' => [
                'nullable',
                Rule::exists('achievements', 'id')->where(function (Builder $query) use ($request) {
                    return $query->where('user_id', $request->user()->id);
                }),
            ]],
            [],
            [
                'name'  => 'Имя',
                'about' => 'О себе',
            ]);

        $selectedAchievementClass = $request->user()->achievements()
            ->where('id', $request->input('selected_achievement'))
            ->first()?->achievement_type;

        $request->user()->fill([
            'name'                 => $request->input('name'),
            'about'                => $request->input('about'),
            'selected_achievement' => $selectedAchievementClass,
        ])->save();

        Toast::success('Профиль был обновлён.');

        return redirect()->route('profile', $request->user());
    }
}
