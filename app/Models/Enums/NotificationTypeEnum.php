<?php

namespace App\Models\Enums;

enum NotificationTypeEnum: string
{
    case Default = 'default';
    case ReplyComment = 'reply-comment';

}
