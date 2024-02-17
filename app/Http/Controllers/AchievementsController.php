<?php

namespace App\Http\Controllers;

use App\Achievements\ContentCreator;
use App\Achievements\DiscussionInspirer;
use App\Achievements\DiscussionMagnet;
use App\Achievements\DiscussionStar;
use App\Achievements\Educator;
use App\Achievements\Lipa;
use App\Achievements\Magus;
use App\Achievements\MasterOfDiscussions;
use App\Achievements\Opening;
use App\Achievements\PricelessCommentator;
use App\Achievements\RecognizedAuthor;
use App\Achievements\Troll;
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
        $groups = collect([
            'Контент' => [
                ContentCreator::class,
                DiscussionInspirer::class,
                DiscussionMagnet::class,
            ],

            'Холивар' => [
                ContentCreator::class,
                DiscussionInspirer::class,
                DiscussionMagnet::class,
            ],

            'Дискуссии' => [
                MasterOfDiscussions::class,
                DiscussionStar::class,
                PricelessCommentator::class,
            ],

            'Уникальные' => [
                Magus::class,
                Troll::class,
                Opening::class,
                Lipa::class,
            ],

            /*
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

            // Уникальные
            Magus::class,
            Troll::class,
            */
        ])->map(fn($achievements) => $this->setDataForAchievement($achievements, $request->user()));

        return view('achievements.index', [
            'groups' => $groups,
        ]);
    }

    protected function setDataForAchievement(array $achievements, User $user): Collection
    {
        return collect($achievements)
            ->map(fn($achievement) => app($achievement))
            ->map(function ($achievement) use ($user) {

                $achievement->used = $user->achievements()
                    ->where('achievement_type', $achievement::class)
                    ->exists();

                $countAllUsers = User::count();
                $countUses = Achievement::where('achievement_type', $achievement::class)->count();

                $achievement->percent = $countUses == 0 ? 0 : round($countUses / $countAllUsers * 100);

                return $achievement;
            });
    }
}
