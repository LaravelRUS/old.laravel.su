<?php

declare(strict_types=1);

namespace App\Orchid\Presenters;

use Illuminate\Support\Str;
use Orchid\Support\Presenter;

class PositionPresenter extends Presenter
{
    /**
     * Returns the salary for this presenter, which is used in the UI to identify it.
     */
    public function salary(): string
    {
        if (!is_null($this->entity->salary_min) && !is_null($this->entity->salary_max)) {
            return number_format($this->entity->salary_min, 0, ' ', ' ')
                . ' - ' .
                number_format($this->entity->salary_max, 0, ' ', ' ') . ' ₽';
        }

        if (!is_null($this->entity->salary_min)) {
            return 'от ' . number_format($this->entity->salary_min, 0, ' ', ' ') . ' ₽';
        }

        if (!is_null($this->entity->salary_max)) {
            return 'до ' . number_format($this->entity->salary_max, 0, ' ', ' ') . ' ₽';
        }

        return 'Не указано';
    }
}
