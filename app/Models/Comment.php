<?php

namespace App\Models;

use App\Models\Concerns\Approvable;
use App\Models\Concerns\HasAuthor;
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
    use Approvable, Chartable, HasAuthor, HasFactory, Likeable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'post_id',
        'parent_id',
        'content',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'post_id'   => 'integer',
        'user_id'   => 'integer',
        'parent_id' => 'integer',
        'approved'  => 'boolean',
    ];

    /**
     * Get the post that owns the comment.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class, 'post_id');
    }

    /**
     * Get the replies to the comment.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function replies(): HasMany
    {
        return $this->hasMany(static::class, 'parent_id');
    }

    /**
     * Get the parent comment of the comment.
     */
    public function parent()
    {
        return $this->belongsTo(static::class, 'parent_id');
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
     * Convert URLs in text to HTML links.
     *
     * @param string|null $text
     *
     * @return string
     */
    protected function urlFromTextToHtmlUrl(?string $text = null): string
    {
        return Str::of($text)
            ->replaceMatches('/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/u', fn ($url) => "<a href='$url[0]' target='_blank'>$url[0]</a> ");
    }

    /**
     * Convert mentioned usernames to HTML links.
     *
     * @param string|null $text
     *
     * @return string
     */
    protected function mentionedUserToHtmlUrl(?string $text = null): string
    {
        return Str::of($text)
            ->replaceMatches('/\@([a-zA-Z0-9_]+)/u', function ($mention) {
                $href = route('user.show', $mention[1]); // над наверное заменить на route('profile', $mention[1])
                $name = Str::of($mention[0])->trim();

                return "<a href='$href' class='text-decoration-none'>$name</a>";
            });
    }

    /**
     * Convert newlines to HTML line breaks.
     *
     * @param string|null $text
     *
     * @return string
     */
    protected function nl2br(?string $text = null)
    {
        return nl2br($text);
    }

    /**
     * Get the pretty formatted comment content.
     *
     * @return string
     */
    public function prettyComment(): string
    {
        $safe = htmlspecialchars($this->content ?? '', ENT_NOQUOTES, 'UTF-8');

        $withLinks = $this->urlFromTextToHtmlUrl($safe);
        $withMention = $this->mentionedUserToHtmlUrl($withLinks);

        return $this->nl2br($withMention);
    }

    /**
     * Get the users mentioned in the comment content.
     *
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Support\Collection
     */
    public function getMentionedUsers()
    {
        $usersNikNames = Str::of($this->content)->matchAll('/\@([a-zA-Z0-9_]+)/u');
        if ($usersNikNames->isEmpty()) {
            return collect();
        }

        return User::whereIn('nickname', $usersNikNames)->get();
    }
}
