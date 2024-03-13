<?php

namespace App\Achievements;

interface Achievement
{
    /**
     * Получить название достижения.
     *
     * @return string
     */
    public function name(): string;

    /**
     * Получить URL изображения достижения.
     *
     * @return string
     */
    public function image(): string;

    /**
     * Получить описание достижения.
     *
     * @return string
     */
    public function description(): string;
}
