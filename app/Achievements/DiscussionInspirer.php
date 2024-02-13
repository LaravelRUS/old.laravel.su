<?php

namespace App\Achievements;

class DiscussionInspirer implements Achievement
{
    /**
     * Получить название достижения.
     *
     * @return string
     */
    public function name(): string
    {
        return 'Вдохновитель Обсуждений';
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
        return 'Автор поста, к которому оставили более 30 комментариев в течении недели после публикации';
    }
}
