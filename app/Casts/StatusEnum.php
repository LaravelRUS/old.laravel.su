<?php

namespace App\Casts;

enum StatusEnum: string
{
    case Publish = 'publish';
    case Draft = 'draft';

}
