<?php

declare(strict_types=1);

namespace App\ContentRenderer;

enum Type
{
    case ARTICLE;

    case MENU;
    case DOCUMENTATION;

    case MENU_TRANSLATION;
    case DOCUMENTATION_TRANSLATION;
}
