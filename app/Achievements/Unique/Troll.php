<?php

namespace App\Achievements\Unique;

use App\Achievements\Achievement;

class Troll implements Achievement
{
    /**
     * Получить название достижения.
     *
     * @return string
     */
    public function name(): string
    {
        return 'Тролль';
    }

    /**
     * Получить URL изображения достижения.
     *
     * @return string
     */
    public function image(): string
    {
        return asset('/img/achievements/ehh.svg');
    }

    /**
     * Получить описание достижения.
     *
     * @return string
     */
    public function description(): string
    {
        return 'Обладает магической способностью понимать язык животных и общаться с ними.';
    }
}
