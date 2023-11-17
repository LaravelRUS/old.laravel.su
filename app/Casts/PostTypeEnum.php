<?php

namespace App\Casts;

enum PostTypeEnum: string
{
    case Article = 'article';
    case Link = 'link';

}
