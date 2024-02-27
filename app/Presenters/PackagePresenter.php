<?php

namespace App\Presenters;

use Illuminate\Support\Number;
use Orchid\Support\Presenter;

class PackagePresenter extends Presenter
{
    /**
     * Получить форматирование значение количества звёзд.
     *
     * @return string
     */
    public function stars(): ?string
    {
        return Number::abbreviate(number: $this->entity->stars ?? 0);
    }
}
