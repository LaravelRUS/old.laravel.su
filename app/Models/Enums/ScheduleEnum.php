<?php

namespace App\Models\Enums;

enum ScheduleEnum: string
{
    case FullDay = 'full-day';
    case DistantWork = 'distant-work';

    case ProjectWork = 'project-work';

    public function text(): string
    {
        return match ($this) {
            self::FullDay     => 'Полный день',
            self::DistantWork => 'Удалённая работа',
            self::ProjectWork => 'Проектная работа',
        };
    }
}
