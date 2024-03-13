<?php

declare(strict_types=1);

namespace App\Models\Presenters;

use Illuminate\Support\Str;
use Orchid\Support\Presenter;

class AchievementPresenter extends Presenter
{
    /**
     * Получить название достижения.
     *
     * @return string
     */
    public function name(): string
    {
        return $this->entity->name();
    }

    /**
     * Получить URL изображения достижения.
     *
     * @return string
     */
    public function image(): string
    {
        return $this->entity->image();
    }

    /**
     * Получить описание достижения.
     *
     * @return string
     */
    public function description(): string
    {
        return $this->entity->description();
    }

    /**
     * Получить название класса достижения.
     *
     * @return string
     */
    public function className(): string
    {
        return Str::snake(class_basename($this->entity->achievement_type));
    }
}
