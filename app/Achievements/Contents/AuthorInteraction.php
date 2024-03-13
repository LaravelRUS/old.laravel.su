<?php

namespace App\Achievements\Contents;

use App\Achievements\Achievement;

class AuthorInteraction implements Achievement
{
    /**
     * Получить название достижения.
     *
     * @return string
     */
    public function name(): string
    {
        return 'Баловень';
    }

    /**
     * Получить URL изображения достижения.
     *
     * @return string
     */
    public function image(): string
    {
        return asset('/img/achievements/bogatyr.svg');
    }

    /**
     * Получить описание достижения.
     *
     * @return string
     */
    public function description(): string
    {
        return 'Набрал более 10 лайков в течении недели после публикации.';
    }
}
