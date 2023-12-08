<?php

namespace App\Casts;

enum SortEnum: string
{
    case Latest = 'new';
    case Popular = 'popular';

    public function text(): string
    {
        return match ($this) {
            self::Latest => 'Новые',
            self::Popular => 'Популярные'
        };
    }

}
