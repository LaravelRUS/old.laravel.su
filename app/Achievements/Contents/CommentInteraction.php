<?php

namespace App\Achievements\Contents;

use App\Achievements\Achievement;

class CommentInteraction implements Achievement
{
    /**
     * Получить название достижения.
     *
     * @return string
     */
    public function name(): string
    {
        return 'Балабол';
    }

    /**
     * Получить URL изображения достижения.
     *
     * @return string
     */
    public function image(): string
    {
        return asset('/img/achievements/cat.svg');
    }

    /**
     * Получить описание достижения.
     *
     * @return string
     */
    public function description(): string
    {
        return '10+ комментариев за неделю: твой голос имеет значение.';
    }
}
