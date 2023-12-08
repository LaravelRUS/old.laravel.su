<?php

namespace App\Casts;

enum ScheduleEnum: string
{
    case FullDay = 'full-day';
    case FlexibleSchedule = 'flexible-schedule';
    case DistantWork = 'distant-work';

    public function text(): string
    {
        return match ($this) {
            self::FullDay => 'Полный день',
            self::FlexibleSchedule => 'Гибкий график',
            self::DistantWork => 'Удалённая работа',
        };
    }

}
