<?php

namespace App\Casts;

enum NotificationTypeEnum: string
{
    case Default = 'default';
    case ReplyComment = 'reply-comment';

}
