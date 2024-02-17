<?php

namespace App\Http\Controllers;

use App\Achievements\ContentCreator;
use App\Achievements\DiscussionInspirer;
use App\Achievements\DiscussionMagnet;
use App\Achievements\DiscussionStar;
use App\Achievements\Educator;
use App\Achievements\MasterOfDiscussions;
use App\Achievements\Opening;
use App\Achievements\PricelessCommentator;
use App\Achievements\RecognizedAuthor;
use App\Achievements\Writer;
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
        $achievements = [
            Opening::class,

            // за пост с лайками
            Writer::class,
            RecognizedAuthor::class,
            Educator::class,

            // за пост с комментариями
            ContentCreator::class,
            DiscussionInspirer::class,
            DiscussionMagnet::class,

            // За количество комментариев в течение недели
            PricelessCommentator::class,
            MasterOfDiscussions::class,
            DiscussionStar::class,

        ];

        return view('achievements.index', [
            'achievements' => $this->setDataForAchievement(collect($achievements), $request->user()),
        ]);
    }

    protected function setDataForAchievement(Collection $achievements, User $user): Collection
    {
        return $achievements
            ->map(fn ($achievement) => app($achievement))
            ->map(function ($achievement) use ($user) {

                $achievement->used = $user->achievements()->where('achievement_type', $achievement::class)->exists();

                $countAllUsers = User::count();
                $countUses = Achievement::where('achievement_type', $achievement::class)->count();

                $achievement->percent = $countUses == 0 ? 0 : round($countUses / $countAllUsers * 100);

                return $achievement;
            });
    }
}
