<?php

namespace App\Achievements;

class PricelessCommentator implements Achievement
{
    /**
     * Получить название достижения.
     *
     * @return string
     */
    public function name(): string
    {
        return 'Бесценный комментатор';
    }

    /**
     * Получить URL изображения достижения.
     *
     * @return string
     */
    public function image(): string
    {
        return asset('/img/achievements/goldfish.svg');
    }

    /**
     * Получить описание достижения.
     *
     * @return string
     */
    public function description(): string
    {
        return 'Написал более 10 комментариев за неделю';
    }
}
