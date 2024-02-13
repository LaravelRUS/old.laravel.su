<?php

namespace App\Notifications;

use App\Models\Comment;
use App\Models\IdeaKey;
use App\Models\User;
use App\Notifications\Channels\SiteChannel;
use App\Notifications\Channels\SiteMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use NotificationChannels\WebPush\WebPushChannel;
use NotificationChannels\WebPush\WebPushMessage;

class CommentNotification extends Notification implements ShouldQueue
{
    use Queueable;

    private Comment $comment;

    /**
     * FriendlyHugs constructor.
     *
     * @param IdeaKey $ideaKey
     */
    public function __construct(Comment $comment)
    {
        $this->comment = $comment;
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
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toSite(User $user)
    {
        $url = route('post.show', $this->comment->post).'#'.dom_id($this->comment);

        return (new SiteMessage())
            ->title('оставил комментарий к вашей публикации')
            ->setCommentAuthor($this->comment->author->name)
            ->img($this->comment->author->avatar)
            ->action($url, $this->comment->post->title);
    }

    /**
     * @param \App\Models\User $user
     *
     * @return \NotificationChannels\WebPush\WebPushMessage
     */
    public function toWebPush(User $user)
    {
        $url = route('post.show', $this->comment->post).'#'.dom_id($this->comment);

        return (new WebPushMessage)
            ->title('Новый комментарий')
            ->icon($this->comment->author->avatar)
            ->body($this->comment->content)
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
