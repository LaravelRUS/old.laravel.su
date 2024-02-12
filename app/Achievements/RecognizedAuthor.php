<?php

namespace App\Achievements;

class RecognizedAuthor implements Achievement
{
    /**
     * Получить название достижения.
     *
     * @return string
     */
    public function name(): string
    {
        return 'Признанный автор';
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
        return 'Автор поста набравшего более 30 лайков в течении недели после публикации';
    }
}
