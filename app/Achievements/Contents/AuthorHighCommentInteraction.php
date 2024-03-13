<?php

namespace App\Achievements\Contents;

use App\Achievements\Achievement;

class AuthorHighCommentInteraction implements Achievement
{
    /**
     * Получить название достижения.
     *
     * @return string
     */
    public function name(): string
    {
        return 'Мегаинициатор';
    }

    /**
     * Получить URL изображения достижения.
     *
     * @return string
     */
    public function image(): string
    {
        return asset('/img/achievements/phoenix.svg');
    }

    /**
     * Получить описание достижения.
     *
     * @return string
     */
    public function description(): string
    {
        return 'Автор, получивший более 30 комментариев в течение недели после публикации.';
    }
}
