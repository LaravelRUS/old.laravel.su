<?php

namespace App\Achievements\Unique;

use App\Achievements\Achievement;

class Lipa implements Achievement
{
    /**
     * Получить название достижения.
     *
     * @return string
     */
    public function name(): string
    {
        return 'Переводчик';
    }

    /**
     * Получить URL изображения достижения.
     *
     * @return string
     */
    public function image(): string
    {
        return asset('/img/achievements/leaf.svg');
    }

    /**
     * Получить описание достижения.
     *
     * @return string
     */
    public function description(): string
    {
        return 'Любовь нельзя купить, любовь нельзя украсть, но заслужить - вполне реально.';
    }
}
