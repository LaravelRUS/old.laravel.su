<?php

namespace App\Notifications;

use App\Models\User;
use App\Notifications\Channels\SiteChannel;
use App\Notifications\Channels\SiteMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use NotificationChannels\WebPush\WebPushChannel;
use NotificationChannels\WebPush\WebPushMessage;

class SimpleMessageNotification extends Notification implements ShouldQueue
{
    use Queueable;

    private string $message;

    public function __construct(string $message)
    {
        $this->message = $message;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     *
     * @return array
     */
    public function via(User $user)
    {
        return [
            SiteChannel::class,
            WebPushChannel::class,
        ];
    }

    /**
     * Get the app representation of the notification.
     *
     * @param mixed $user
     *
     * @return SiteMessage
     */
    public function toSite(User $user)
    {
        return (new SiteMessage())
            ->title($this->message)
            ->img(asset('/img/avatars/avatar2.svg'));
    }

    /**
     * @param \App\Models\User $user
     *
     * @return \NotificationChannels\WebPush\WebPushMessage
     */
    public function toWebPush(User $user)
    {
        return (new WebPushMessage)
            ->title($this->message)
            ->icon(asset('/img/avatars/avatar2.svg'))
            ->vibrate([300, 200, 300])
            ->options([
                'TTL'     => 86400, // in seconds - 24 hours,
                'urgency' => 'high',
            ]);
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
