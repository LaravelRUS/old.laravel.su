<?php

namespace App\Notifications;

use App\Models\Achievement;
use App\Notifications\Channels\SiteChannel;
use App\Notifications\Channels\SiteMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use NotificationChannels\WebPush\WebPushChannel;
use NotificationChannels\WebPush\WebPushMessage;

class AchievementNotification extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * @param \App\Models\Achievement $achievement
     */
    public function __construct(private Achievement $achievement)
    {

    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     *
     * @return array
     */
    public function via()
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
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toSite()
    {
        $url = route('achievements');

        return (new SiteMessage())
            ->title('Вы получили достижение "'.$this->achievement->presenter()->name().'".')
            ->img($this->achievement->presenter()->image())
            ->action($url, 'Посмотреть');
    }

    /**
     * @param \App\Models\User $user
     *
     * @return \NotificationChannels\WebPush\WebPushMessage
     */
    public function toWebPush()
    {
        $url = route('achievements');

        return (new WebPushMessage)
            ->title('Вы получили достижение "'.$this->achievement->presenter()->name().'".')
            ->icon($this->achievement->presenter()->image())
            ->action('Посмотреть', $url)
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
