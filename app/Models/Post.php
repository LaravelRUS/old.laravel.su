<?php

namespace App\Models;

use App\Models\Concerns\HasAuthor;
use App\Models\Concerns\LogsActivityFillable;
use App\Models\Concerns\Taggable;
use App\Models\Enums\PostTypeEnum;
use App\Models\Enums\StatusEnum;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Laravel\Scout\Searchable;
use NotificationChannels\Telegram\TelegramMessage;
use Orchid\Filters\Filterable;
use Orchid\Filters\Types\Like;
use Orchid\Metrics\Chartable;
use Orchid\Screen\AsSource;
use Overtrue\LaravelLike\Traits\Likeable;

/**
 *  Class Post
 *
 *  TODO:
 *  Single Table Inheritance (STI) model representing various types of content.
 *  This class serves as the base model from which specific types of posts
 *  inherit. The 'type' attribute is used to distinguish between different
 *  post types in the single 'posts' table.
 */
class Post extends Model
{
    use AsSource, Chartable, Filterable, HasAuthor, HasFactory, Likeable, LogsActivityFillable, Searchable, Taggable;

    /**
     * @var string[]
     */
    protected $fillable = [
        'title',
        'content',
        'slug',
        'user_id',
        'type',
        'status',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'title'   => 'string',
        'content' => 'string',
        'slug'    => 'string',
        'type'    => PostTypeEnum::class,
        'status'  => StatusEnum::class,
    ];

    protected $attributes = [
        'type' => PostTypeEnum::Article,
    ];

    /**
     * @var array
     */
    protected $allowedFilters = [
        'title'   => Like::class,
        'content' => Like::class,
    ];

    protected $allowedSorts = [
        'title',
        'created_at',
        'updated_at',
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($post) {
            $slug = Str::slug($post->title);
            $i = 1;

            while (static::where('slug', $slug)->exists()) {
                $slug = Str::slug($post->title).'-'.$i++;
            }

            $post->slug = $slug;
        });

        static::created(function (Post $post) {
            try {
                if (config('app.env') == 'local') {
                    return;
                }

                TelegramMessage::create()
                    ->to(config('services.telegram-bot-api.channel_id'))
                    ->escapedLine($post->title)
                    ->content(route('post.show', $post))
                    ->send();
            } catch (\Throwable $e) {
                report($e);
            }
        });
    }

    /**
     * Get only posts with a custom status.
     *
     * @param Builder           $query
     * @param StatusEnum|string $postStatus
     *
     * @return Builder
     */
    public function scopeStatus(Builder $query, string|StatusEnum $postStatus): Builder
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
     * Calculate the estimated time to read the content.
     *
     * @param int $wordsPerMinute Average number of words a reader can read per minute.
     *
     * @return int Estimated time in minutes to read the content.
     */
    public function estimatedReadingTime(int $wordsPerMinute = 100): int
    {
        return ceil(Str::of($this->content)->matchAll("/\s+/")->count() / $wordsPerMinute);
    }

    /**
     * Retrieve value for the HTML 'description' attribute.
     *
     * This method returns a truncated string with a maximum of 20 words,
     * stripped of any HTML tags, to be used as the 'description' attribute
     * for SEO purposes.
     *
     * @return \Illuminate\Support\Stringable The truncated description string.
     */
    public function getDescriptionAttribute()
    {
        return Str::of($this->content)->stripTags()->words(20);
    }
}
