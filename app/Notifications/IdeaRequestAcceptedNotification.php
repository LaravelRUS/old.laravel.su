<?php

namespace App\Notifications;

use App\Casts\FriendlyHugsType;
use App\Models\IdeaKey;
use App\Models\User;
use App\Notifications\Channels\EmotionTrackerChannel;
use App\Notifications\Channels\EmotionTrackerMessage;
use App\Notifications\Channels\LaravelSuChannel;
use App\Notifications\Channels\LaravelSuMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;

class IdeaRequestAcceptedNotification extends Notification implements ShouldQueue
{
    use Queueable;

    private IdeaKey $ideaKey;

    /**
     * FriendlyHugs constructor.
     *
     * @param IdeaKey $ideaKey
     */
    public function __construct(IdeaKey $ideaKey)
    {
        $this->ideaKey = $ideaKey;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     *
     * @return array
     */
    public function via($notifiable)
    {
        return [LaravelSuChannel::class];
    }

    /**
     * Get the app representation of the notification.
     *
     * @param mixed $user
     *
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toLaravelSu(User $user)
    {
        return (new LaravelSuMessage())
            ->title('Ваш запрос на получение ключа Laravel Idea одобрен')
            ->setUseClipboard($this->ideaKey->key);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     *
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
