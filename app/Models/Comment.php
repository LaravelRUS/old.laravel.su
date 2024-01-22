<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Orchid\Metrics\Chartable;
use Overtrue\LaravelLike\Traits\Likeable;

class Comment extends Model
{
    use HasFactory, SoftDeletes, Likeable, Chartable;

    /**
     * @var string
     */
    protected $table = 'comments';

    /**
     * @var array
     */
    protected $fillable = [
        'post_id',
        'user_id',
        'parent_id',
        'content',
        'approved',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'post_id'   => 'integer',
        'user_id'   => 'integer',
        'parent_id' => 'integer',
        'approved'  => 'boolean',
    ];

    /**
     * Find a comment by post ID.
     *
     * @param int $postId
     *
     * @return mixed
     */
    public static function findByPostId(int $postId)
    {
        $instance = new static();

        return $instance->where('post_id', $postId)->get();
    }

    /**
     * Post relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class, 'post_id');
    }

    /**
     * Replies relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function replies(): HasMany
    {
        return $this->hasMany(static::class, 'parent_id');
    }

    /**
     * Returns the comment to which this comment belongs to.
     */
    public function parent()
    {
        return $this->belongsTo(static::class, 'parent_id');
    }

    /**
     * Verify if the current comment is approved.
     *
     * @return bool
     */
    public function isApproved(): bool
    {
        return $this->attributes['approved'] === 1 || $this->attributes['approved'] === true;
    }

    /**
     * Verify if the current comment is a reply from another comment.
     *
     * @return bool
     */
    public function isReply(): bool
    {
        return $this->attributes['parent_id'] > 0;
    }

    /**
     * Verify if the current comment has replies.
     *
     * @return bool
     */
    public function hasReplies(): bool
    {
        return count($this->replies) > 0;
    }

    /**
     *   Author relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Where clause for only approved comments.
     *
     * @param Builder $query
     *
     * @return Builder
     */
    public function scopeApproved(Builder $query): Builder
    {
        return $query->where('approved', 1);
    }

    /**
     * @param string|null $text
     *
     * @return string
     */
    protected function urlFromTextToHtmlUrl(string $text = null): string
    {
        return Str::of($text)
            ->replaceMatches('/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/u', fn ($url) => "<a href='$url[0]' target='_blank'>$url[0]</a> ");
    }

    /**
     * @param string|null $text
     *
     * @return string
     */
    protected function mentionedUserToHtmlUrl(string $text = null): string
    {
        return Str::of($text)
            ->replaceMatches('/\@([a-zA-Z0-9_]+)/u', function ($mention) {
                $href = route('user.show', $mention[1]);// над наверное заменить на route('profile', $mention[1])
                $name = Str::of($mention[0])->trim();

                return "<a href='$href' class='text-decoration-none'>$name</a>";
            });
    }

    /**
     * @param string|null $text
     *
     * @return string
     */
    protected function nl2br(string $text = null)
    {
        return nl2br($text);
    }

    /**
     * @return string
     */
    public function prettyComment(): string
    {
        $safe = htmlspecialchars($this->content ?? '', ENT_NOQUOTES, 'UTF-8');

        $withLinks = $this->urlFromTextToHtmlUrl($safe);
        $withMention = $this->mentionedUserToHtmlUrl($withLinks);

        return $this->nl2br($withMention);
    }


    public function getMentionedUsers()
    {
       $usersNikNames  = Str::of($this->content)->matchAll('/\@([a-zA-Z0-9_]+)/u');
       if($usersNikNames->isEmpty()){
           return collect();
       }
       return User::whereIn('nickname', $usersNikNames)->get();

    }
}
