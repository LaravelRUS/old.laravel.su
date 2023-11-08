<?php

namespace App\Models;

use App\Docs;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Comment extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * @var string[]
     */
    protected $attributes = [
        'commentable_type' => Post::class,
        'commenter_type'   => User::class,
    ];

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = [
        'commenter',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'comment',
        'approved',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'approved' => 'boolean',
    ];

    /**
     * The user who posted the comment.
     */
    public function commenter()
    {
        return $this->morphTo();
    }

    /**
     * The model that was commented upon.
     */
    public function commentable()
    {
        return $this->morphTo();
    }

    /**
     * Returns all comments that this comment is the parent of.
     */
    public function children()
    {
        return $this->hasMany(static::class, 'child_id');
    }

    /**
     * Returns the comment to which this comment belongs to.
     */
    public function parent()
    {
        return $this->belongsTo(static::class, 'child_id');
    }


    /**
     * @param string|null $text
     *
     * @return string
     */
    protected function urlsToLink(string $text = null): string
    {
        return Str::of($text)
            ->replaceMatches('/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/u', fn ($url) => "<a href='$url[0]' target='_blank'>$url[0]</a> ");
    }

    /**
     * @param string|null $text
     *
     * @return string
     */
    protected function mentionsToLink(string $text = null): string
    {
        return Str::of($text)
            ->replaceMatches('/\@([a-zA-Z0-9_]+)/u', function ($mention) {
                $href = route('user.show', $mention[1]);
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
        $safe = htmlspecialchars($this->comment ?? '', ENT_NOQUOTES, 'UTF-8');

        $withLinks = $this->urlsToLink($safe);
        $withMention = $this->mentionsToLink($withLinks);

        return $this->nl2br($withMention);
    }
}
