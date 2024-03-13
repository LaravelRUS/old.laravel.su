<?php

namespace App\Achievements\Contents;

use App\Achievements\Achievement;

class AuthorHighInteraction implements Achievement
{
    /**
     * Получить название достижения.
     *
     * @return string
     */
    public function name(): string
    {
        return 'Весельчак';
    }

    /**
     * Получить URL изображения достижения.
     *
     * @return string
     */
    public function image(): string
    {
        return asset('/img/achievements/fire.svg');
    }

    /**
     * Получить описание достижения.
     *
     * @return string
     */
    public function description(): string
    {
        return 'Набрал более 30 лайков в течении недели после публикации.';
    }
}
