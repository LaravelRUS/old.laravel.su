<?php

namespace App\Models;

use App\Models\Concerns\HasComments;
use App\Models\Concerns\Taggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Laravel\Scout\Searchable;

class Post extends Model
{
    use HasFactory, HasComments, Taggable, Searchable;

    /**
     * @var string[]
     */
    protected $fillable = [
        'title',
        'content',
        'slug',
        'user_id'
    ];

    /**
     * @var array
     */
    protected $casts = [
        'type'    => 'string',
        'slug'    => 'string',
        'content' => 'array',
        'options' => 'array',
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
    public function author(): BelongsTo
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
     * @return int Estimated time in minutes to read the content.
     */
    public function estimatedReadingTime(int $wordsPerMinute = 100): int
    {
        return ceil(Str::of($this->content)->wordCount() / $wordsPerMinute);
    }
}
