<?php

namespace App\Achievements\Unique;

use App\Achievements\Achievement;

class BigMzungu implements Achievement
{
    /**
     * Получить название достижения.
     *
     * @return string
     */
    public function name(): string
    {
        return 'Большой Мзунгу';
    }

    /**
     * Получить URL изображения достижения.
     *
     * @return string
     */
    public function image(): string
    {
        return asset('/img/achievements/wizard.svg');
    }

    /**
     * Получить описание достижения.
     *
     * @return string
     */
    public function description(): string
    {
        return 'Ибо только истинный мзунгу, покаравший тысячи-тысяч новичков достоин сие.';
    }
}
