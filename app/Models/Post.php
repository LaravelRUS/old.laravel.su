<?php

namespace App\Models;

use App\Casts\PostTypeEnum;
use App\Casts\StatusEnum;
use App\Models\Concerns\Taggable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Laravel\Scout\Searchable;
use Overtrue\LaravelLike\Traits\Likeable;
use Spatie\Feed\Feedable;
use Spatie\Feed\FeedItem;

/**
 *  Class Post
 *
 *  Single Table Inheritance (STI) model representing various types of content.
 *  This class serves as the base model from which specific types of posts
 *  inherit. The 'type' attribute is used to distinguish between different
 *  post types in the single 'posts' table.
 */
class Post extends Model implements Feedable
{
    use HasFactory, Taggable, Searchable, Likeable;

    /**
     * @var string[]
     */
    protected $fillable = [
        'title',
        'content',
        'slug',
        'user_id',
        'type',
        'status'
    ];

    /**
     * @var array
     */
    protected $casts = [
        'title'   => 'string',
        'content' => 'string',
        'slug'    => 'string',
        'type'    => PostTypeEnum::class,
        'status'  => StatusEnum::class
    ];

    protected $attributes = [
        'type' => PostTypeEnum::Article
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($post) {
            $slug = Str::slug($post->title);
            $i = 1;

            while (static::where('slug', $slug)->exists()) {
                $slug = Str::slug($post->title) . '-' . $i++;
            }

            $post->slug = $slug;
        });
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Author relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function author()
    {
        return $this->user();
    }


    /**
     * Get only posts with a custom status.
     *
     * @param Builder $query
     * @param string  $postStatus
     *
     * @return Builder
     */
    public function scopeStatus(Builder $query, string $postStatus): Builder
    {
        return $query->where('status', $postStatus);
    }

    /**
     * Get only posts from a custom post type.
     *
     * @param Builder $query
     * @param string  $type
     *
     * @return Builder
     */
    public function scopeType(Builder $query, string $type): Builder
    {
        return $query->where('type', $type);
    }

    /**
     * Get only posts from an array of custom post types.
     *
     * @param Builder $query
     * @param array   $type
     *
     * @return Builder
     */
    public function scopeTypeIn(Builder $query, array $type): Builder
    {
        return $query->whereIn('type', $type);
    }

    /**
     * Returns all comments for this model.
     */
    public function comments()
    {
        return $this->hasMany(Comment::class)->withTrashed();
    }

    /**
     * @return mixed
     */
    public function preview()
    {
        return $this->content;
    }

    /**
     * Get the indexable data array for the model.
     *
     * @return array<string, mixed>
     */
    public function toSearchableArray(): array
    {
        $array = $this->toArray();

        // Customize the data array...

        return $array;
    }

    /**
     * @return \App\Models\FeedItem
     */
    public function toFeedItem(): FeedItem
    {
        return FeedItem::create()
            ->id($this->id)
            ->title($this->title)
            ->summary(Str::of($this->content)->markdown())
            ->updated($this->updated_at)
            ->link(route('feed', $this))
            ->authorName($this->author->name);
    }

    /**
     * @return mixed
     */
    public static function getFeedItems()
    {
        return static::orderBy('id', 'desc')->with('author')->limit(30)->get();
    }

    /**
     * Calculate the estimated time to read the content.
     *
     * @param int $wordsPerMinute Average number of words a reader can read per minute.
     * @return int Estimated time in minutes to read the content.
     */
    public function estimatedReadingTime(int $wordsPerMinute = 100): int
    {
        return ceil(Str::of($this->content)->matchAll("/\s+/")->count() / $wordsPerMinute);
    }
}
