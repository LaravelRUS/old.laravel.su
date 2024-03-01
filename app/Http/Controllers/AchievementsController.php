<?php

namespace App\Http\Controllers;

use App\Achievements\Contents\AuthorCommentInteraction;
use App\Achievements\Contents\AuthorHighCommentInteraction;
use App\Achievements\Contents\AuthorHighInteraction;
use App\Achievements\Contents\AuthorInteraction;
use App\Achievements\Contents\CommentInteraction;
use App\Achievements\Contents\HighCommentInteraction;
use App\Achievements\Events\OpeningWebSite;
use App\Achievements\Unique\BigMzungu;
use App\Achievements\Unique\Lipa;
use App\Achievements\Unique\Troll;
use App\Models\Achievement;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class AchievementsController extends Controller
{
    /**
     * @param \App\Models\CodeSnippet|null $snippet
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        $groups = collect([
            'Контент и Дискуссии' => [
                AuthorInteraction::class,
                AuthorHighInteraction::class,
                AuthorCommentInteraction::class,
                AuthorHighCommentInteraction::class,
                CommentInteraction::class,
                HighCommentInteraction::class,
            ],

            'Уникальные' => [
                Troll::class,
                Lipa::class,
                BigMzungu::class,
            ],

            'Событийные' => [
                OpeningWebSite::class,
            ],
        ])->map(fn ($achievements) => $this->setDataForAchievement($achievements, $request->user()));

        return view('achievements.index', [
            'groups' => $groups,
        ]);
    }

    protected function setDataForAchievement(array $achievements, ?User $user): Collection
    {
        return collect($achievements)
            ->map(fn ($achievement) => app($achievement))
            ->map(function ($achievement) use ($user) {

                $achievement->used = ! is_null($user) && $user->achievements()
                    ->where('achievement_type', $achievement::class)
                    ->exists();

                $countAllUsers = User::count();
                $countUses = Achievement::where('achievement_type', $achievement::class)->count();

                $achievement->percent = $countUses == 0 ? 0 : round($countUses / $countAllUsers * 100);

                return $achievement;
            });
    }
}
