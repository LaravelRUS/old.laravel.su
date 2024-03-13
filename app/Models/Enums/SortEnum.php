<?php

namespace App\Models\Enums;

enum SortEnum: string
{
    case Popular = 'popular';
    case Latest = 'new';

    public function text(): string
    {
        return match ($this) {
            self::Popular => 'Популярные',
            self::Latest  => 'Новые',
        };
    }
}
