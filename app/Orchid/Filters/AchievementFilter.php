<?php

declare(strict_types=1);

namespace App\Orchid\Filters;

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
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;
use Orchid\Filters\Filter;
use Orchid\Screen\Fields\Select;

class AchievementFilter extends Filter
{
    protected const ACHIEVEMENTS_LIST = [
        AuthorInteraction::class,
        AuthorHighInteraction::class,
        AuthorCommentInteraction::class,
        AuthorHighCommentInteraction::class,
        CommentInteraction::class,
        HighCommentInteraction::class,
        Troll::class,
        Lipa::class,
        BigMzungu::class,
        OpeningWebSite::class,
    ];

    /**
     * The displayable name of the filter.
     *
     * @return string
     */
    public function name(): string
    {
        return 'Награда';
    }

    /**
     * The array of matched parameters.
     *
     * @return array
     */
    public function parameters(): array
    {
        return ['achievement'];
    }

    /**
     * Apply to a given Eloquent query builder.
     *
     * @param Builder $builder
     *
     * @return Builder
     */
    public function run(Builder $builder): Builder
    {
        return $builder->whereHas('achievements', function (Builder $query) {
            $query->where('achievement_type', $this->getAchievementClass());
        });
    }

    /**
     * Get the display fields.
     */
    public function display(): array
    {
        return [
            Select::make('achievement')
                ->options($this->getOptions()->all())
                ->empty()
                ->value($this->request->get('achievement'))
                ->title('Награда'),
        ];
    }

    /**
     * Value to be displayed
     */
    public function value(): string
    {
        return $this->name().': '.app($this->getAchievementClass())->name();
    }

    /** для красоты, чтобы не пихать например App\Achievements\Events\OpeningWebSite в урл
     *
     * @return \Illuminate\Support\Collection
     */
    protected function getOptions()
    {
        return collect(self::ACHIEVEMENTS_LIST)
            ->mapWithKeys(function ($achievement) {
                $name = app($achievement)->name();

                return [Str::slug($name) => $name];
            });
    }

    /**
     * получить класс награды по слугу названия
     */
    public function getAchievementClass()
    {
        $list = collect(self::ACHIEVEMENTS_LIST)
            ->mapWithKeys(function ($achievement) {
                $name = app($achievement)->name();

                return [Str::slug($name) => $achievement];
            });

        return $list->get($this->request->get('achievement'));
    }
}
