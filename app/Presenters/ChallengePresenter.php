<?php

declare(strict_types=1);

namespace App\Presenters;

use Illuminate\Support\Str;
use Orchid\Support\Presenter;

class ChallengePresenter extends Presenter
{
    /**
     */
    public function subject()
    {
        return $this->entity->isNotStarted() ? Str::of($this->entity->subject)->replaceMatches('/[а-яА-ЯёЁa-zA-Z]/', 'x') : $this->entity->subject;
    }

    public function description()
    {

        return  $this->entity->isNotStarted() ? Str::of(strip_tags($this->entity->description))->replaceMatches('/[а-яА-ЯёЁa-zA-Z]/', 'x') : Str::of($this->entity->description)->markdown();
    }

    public function startDate()
    {
        return $this->entity->start_date->format('d.m.Y H:i');
    }

    public function stopDate()
    {
        return $this->entity->stop_date->format('d.m.Y H:i');
    }
}
