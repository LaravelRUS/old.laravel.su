<?php

declare(strict_types=1);

namespace App\Models\Presenters;

use Illuminate\Support\Str;
use Illuminate\Support\Stringable;
use Orchid\Support\Presenter;

class ChallengePresenter extends Presenter
{
    /**
     * Get the challenge title.
     *
     * If the challenge has already started, returns the original title,
     * otherwise returns the title with letters replaced by 'x'.
     *
     * @return string
     */
    public function title(): string|\Stringable
    {
        return $this->entity->hasStarted()
            ? $this->entity->title
            : $this->sanitizeText($this->entity->title);
    }

    /**
     * Get the challenge description.
     *
     * If the challenge has already started, returns the description in Markdown format,
     * otherwise returns the description with HTML tags removed and letters replaced by 'x'.
     *
     * @return string
     */
    public function description(): string|\Stringable
    {
        return $this->entity->hasStarted()
            ? Str::of($this->entity->description)->markdown()
            : $this->sanitizeText($this->entity->description);
    }

    /**
     * Get the start date and time of the challenge in the format 'day.month.year hour:minute'.
     *
     * @param string $format
     *
     * @return string|null
     */
    public function startDate(string $format = 'd.m.Y H:i'): ?string
    {
        return $this->entity->start_at?->format($format);
    }

    /**
     * Get the end date and time of the challenge in the format 'day.month.year hour:minute'.
     *
     * @param string $format
     *
     * @return string|null
     */
    public function stopDate(string $format = 'd.m.Y H:i'): ?string
    {
        return $this->entity->stop_at?->format($format);
    }

    /**
     * Get the number of days until the challenge starts.
     *
     * @return Stringable
     */
    public function htmlBeforeStart()
    {
        return Str::of($this->entity->start_at?->diffForHumans())
            ->ucfirst()
            ->replaceMatches('/\d+/', function ($match) {
                return "<span class='text-primary'>{$match[0]}</span>";
            });
    }

    /**
     * Sanitize the text by removing HTML tags and replacing letters with the specified symbol.
     *
     * @param string $text
     * @param string $symbol
     *
     * @return \Illuminate\Support\Stringable
     */
    private function sanitizeText(string $text, string $symbol = 'x'): Stringable
    {
        return Str::of($text)->stripTags()->replaceMatches('/[а-яА-ЯёЁa-zA-Z]/', $symbol);
    }
}
