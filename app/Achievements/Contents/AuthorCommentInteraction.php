<?php

namespace App\Achievements\Contents;

use App\Achievements\Achievement;

class AuthorCommentInteraction implements Achievement
{
    /**
     * Получить название достижения.
     *
     * @return string
     */
    public function name(): string
    {
        return 'Боломутчик';
    }

    /**
     * Получить URL изображения достижения.
     *
     * @return string
     */
    public function image(): string
    {
        return asset('/img/achievements/morozko.svg');
    }

    /**
     * Получить описание достижения.
     *
     * @return string
     */
    public function description(): string
    {
        return 'Автор, получивший более 10 комментариев в течение недели после публикации';
    }
}
