<?php

namespace App\Notifications;

use App\Models\IdeaKey;
use App\Models\User;
use App\Notifications\Channels\SiteChannel;
use App\Notifications\Channels\SiteMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use NotificationChannels\WebPush\WebPushChannel;
use NotificationChannels\WebPush\WebPushMessage;

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
    public function via(User $user)
    {
        return [
            SiteChannel::class,
            WebPushChannel::class,
            'mail',
        ];
    }

    /**
     * Get the app representation of the notification.
     *
     * @param mixed $user
     *
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toSite(User $user)
    {
        return (new SiteMessage())
            ->title('Бесплатный ключ Laravel IDEA доступен')
            ->action(route('idea.key', $this->ideaKey), 'по ссылке');
    }

    public function toWebPush($notifiable, $notification)
    {
        return (new WebPushMessage)
            ->title('Бесплатный ключ Laravel IDEA доступен')
            ->icon(asset('icons/logo.svg'))
            // ->body('Пользователь '.$this->author->name."ответил на ваш комментарий")
            ->action('Посмотреть', route('idea.key', $this->ideaKey))
            ->vibrate([300, 200, 300])
            ->options([
                'TTL'     => 86400, // in seconds - 24 hours,
                'urgency' => 'high',
            ]);
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param User $user
     *
     * @throws \Throwable
     *
     * @return MailMessage
     */
    public function toMail(User $user)
    {
        return (new MailMessage)
            ->subject('Бесплатный ключ Laravel IDEA доступен')
            ->line('Мы ценим вашу активность и стремимся делать ваше пребывание максимально полезным и интересным. Чтобы узнать, что новенького, перейдите по ссылке ниже:')
            ->action('Посмотреть уведомления', route('idea.key', $this->ideaKey))
            ->line('Внимательно слушаем ваши идеи и предложения, поэтому не стесняйтесь делиться ими с нами.');
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
