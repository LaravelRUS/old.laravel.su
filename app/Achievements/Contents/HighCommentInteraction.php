<?php

namespace App\Achievements\Contents;

use App\Achievements\Achievement;

class HighCommentInteraction implements Achievement
{
    /**
     * Получить название достижения.
     *
     * @return string
     */
    public function name(): string
    {
        return 'Всегда прав';
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
        return '30+ комментариев за неделю: твой голос неоспорим.';
    }
}
