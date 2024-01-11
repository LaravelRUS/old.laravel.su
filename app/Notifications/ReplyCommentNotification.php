<?php

namespace App\Notifications;

use App\Casts\FriendlyHugsType;
use App\Models\Comment;
use App\Models\IdeaKey;
use App\Models\Post;
use App\Models\User;
use App\Notifications\Channels\EmotionTrackerChannel;
use App\Notifications\Channels\EmotionTrackerMessage;
use App\Notifications\Channels\SiteChannel;
use App\Notifications\Channels\SiteMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;

class ReplyCommentNotification extends Notification implements ShouldQueue
{
    use Queueable;

    private User $author;
    private Comment $comment;
    private Post $post;

    /**
     * FriendlyHugs constructor.
     *
     * @param IdeaKey $ideaKey
     */
    public function __construct(User $author, Comment $comment, Post $post)
    {
        $this->author = $author;
        $this->comment = $comment;
        $this->post = $post;
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
        return [SiteChannel::class];
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
        $url  = route('post.show',$this->post).'#'.dom_id($this->comment);
        return (new SiteMessage())
            ->title('ответил на ваш комментарий')
            ->setCommentAuthor($this->author->name)
            ->img($this->author->avatar)
            ->action($url, $this->post->title);
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
