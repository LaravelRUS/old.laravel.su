<?php

namespace App\Notifications;

use App\Models\Comment;
use App\Models\IdeaKey;
use App\Models\Post;
use App\Models\User;
use App\Notifications\Channels\SiteChannel;
use App\Notifications\Channels\SiteMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use NotificationChannels\WebPush\WebPushChannel;
use NotificationChannels\WebPush\WebPushMessage;

class ReplyCommentNotification extends Notification implements ShouldQueue
{
    use Queueable;

    private Comment $reply;

    /**
     * FriendlyHugs constructor.
     *
     * @param Comment $reply
     */
    public function __construct(Comment $reply)
    {
        $this->reply = $reply;
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
            WebPushChannel::class
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
        $url  = route('post.show',$this->reply->post).'#'.dom_id($this->reply);
        return (new SiteMessage())
            ->title('ответил на ваш комментарий')
            ->setCommentAuthor($this->reply->author->name)
            ->img($this->reply->author->avatar)
            ->action($url, $this->reply->post->title);
    }
    public function toWebPush($notifiable, $notification)
    {
        $url  = route('post.show',$this->reply->post).'#'.dom_id($this->reply);
        return (new WebPushMessage)
            ->title('Пользователь '.$this->reply->author->name.' ответил на ваш комментарий')
            ->icon($this->reply->author->avatar)
            //->body('Пользователь '.$this->author->name." ответил на ваш комментарий")
            ->action('посмотреть',$url)
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
