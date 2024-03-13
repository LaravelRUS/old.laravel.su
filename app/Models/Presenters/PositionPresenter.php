<?php

declare(strict_types=1);

namespace App\Models\Presenters;

use Orchid\Support\Presenter;

class PositionPresenter extends Presenter
{
    /**
     * Get the salary range or display "Not specified" if no salary range is provided.
     *
     * @return string
     */
    public function salary(): string
    {
        if (! is_null($this->entity->salary_min) && ! is_null($this->entity->salary_max)) {
            return $this->formatRange($this->entity->salary_min, $this->entity->salary_max).' ₽';
        }

        if (! is_null($this->entity->salary_min)) {
            return 'от '.$this->formatAmount($this->entity->salary_min).' ₽';
        }

        if (! is_null($this->entity->salary_max)) {
            return 'до '.$this->formatAmount($this->entity->salary_max).' ₽';
        }

        return 'Не указано';
    }

    /**
     * Format the salary range.
     *
     * @param int $min
     * @param int $max
     *
     * @return string
     */
    protected function formatRange(int $min, int $max): string
    {
        return sprintf('%s - %s', $this->formatAmount($min), $this->formatAmount($max));
    }

    /**
     * Format the salary amount.
     *
     * @param int $amount
     *
     * @return string
     */
    protected function formatAmount(int $amount): string
    {
        return number_format($amount, 0, ' ', ' ');
    }
}
