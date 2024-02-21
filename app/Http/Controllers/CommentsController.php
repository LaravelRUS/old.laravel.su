<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Notifications\CommentNotification;
use App\Notifications\MentionNotification;
use App\Notifications\ReplyCommentNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class CommentsController extends Controller
{
    /**
     * @param \App\Models\Post $post
     * @param array            $data
     *
     * @return string
     */
    public function show(Post $post, array $data = [])
    {
        $post->load([
            'comments.author',
            'comments' => function ($query) {
                $query->withCount('likers');
            },
        ]);

        auth()->user()?->attachLikeStatus($post);

        return view('components.comments', array_merge($data, [
            'model' => $post,
        ]));
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return string
     */
    public function store(Request $request)
    {
        $this->authorize('create', Comment::class);

        $comment = new Comment([
            'post_id'  => $request->input('commentable_id'),
            'content'  => $request->input('message'),
            'approved' => true,
        ]);

        $request->user()->comments()->saveMany([$comment]);

        $comment->save();

        if ($comment->author->id != $comment->post->author->id) {
            $comment->post->author->notify(new CommentNotification($comment));
        }

        Notification::send($comment->getMentionedUsers(), new MentionNotification($comment));

        return turbo_stream([
            turbo_stream()
                ->target('comments-wrapper')
                ->action('append')
                ->view('comments._comment', ['comment' => $comment]),

            turbo_stream()
                ->target('new-comment')
                ->action('replace')
                ->view('particles.comments.form', [
                    'model' => $comment->post,
                ]),
        ]);
    }

    /**
     * @param \App\Models\Comment $comment
     *
     * @return string
     */
    public function showReply(Comment $comment)
    {
        return turbo_stream()->replace(
            dom_id($comment),
            view('comments.reply', ['comment' => $comment])
        );
    }

    /**
     * @param \App\Models\Comment $comment
     *
     * @return string
     */
    public function showEdit(Comment $comment)
    {
        return turbo_stream()->replace(
            dom_id($comment),
            view('comments.edit', ['comment' => $comment])
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Comment      $comment
     *
     * @return string
     */
    public function reply(Request $request, Comment $comment)
    {
        $this->authorize('reply', $comment);

        $request->validate([
            'message' => 'required|string',
        ]);

        $reply = new Comment([
            'content'   => $request->input('message'),
            'parent_id' => $comment->id,
            'post_id'   => $comment->post_id,
            'approved'  => true,
        ]);

        $request->user()->comments()->saveMany([$reply]);

        // уведомление автору статьи, что добавился ещё один комментарий
        if ($reply->author->id != $comment->post->author->id) {
            $comment->post->author->notify(new CommentNotification($reply));
        }

        // уведомление для автора родительского комментария
        $comment->author->notify(new ReplyCommentNotification($reply));

        Notification::send($comment->getMentionedUsers(), new MentionNotification($reply));

        return turbo_stream([
            turbo_stream()->append(@dom_id($comment, 'thread'), view('comments._comment', ['comment' => $reply])),
            turbo_stream()->update($comment),
        ]);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Comment      $comment
     *
     * @return string
     */
    public function update(Request $request, Comment $comment)
    {
        $this->authorize('update', $comment);

        $request->validate([
            'message' => 'required|string',
        ]);

        $comment->update([
            'content' => $request->message,
        ]);

        return turbo_stream()->replace($comment);
    }

    /**
     * @param \App\Models\Comment $comment
     *
     * @return string
     */
    public function delete(Comment $comment)
    {
        $this->authorize('delete', $comment);

        if ($comment->replies()->exists()) {
            $comment->delete();

            return turbo_stream()->update($comment);
        }

        $comment->forceDelete();

        return turbo_stream()->remove($comment);
    }
}
