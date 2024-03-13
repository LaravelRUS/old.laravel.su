<?php

namespace App\Achievements\Events;

use App\Achievements\Achievement;

class OpeningWebSite implements Achievement
{
    /**
     * Получить название достижения.
     *
     * @return string
     */
    public function name(): string
    {
        return 'Первооткрыватель';
    }

    /**
     * Получить URL изображения достижения.
     *
     * @return string
     */
    public function image(): string
    {
        return asset('/img/achievements/opening.svg');
    }

    /**
     * Получить описание достижения.
     *
     * @return string
     */
    public function description(): string
    {
        return 'Первым преодолел все загадки на пути к обновлённому сайту';
    }
}
