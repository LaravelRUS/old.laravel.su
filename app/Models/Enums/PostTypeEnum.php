<?php

namespace App\Models\Enums;

enum PostTypeEnum: string
{
    case Article = 'article';
    case Link = 'link';
    case Event = 'event';
    case Package = 'package';

}
