<?php

namespace App\Models;

use App\Models\Concerns\HasComments;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory, HasComments;

    /**
     * @var string[]
     */
    protected $fillable = [
        'title',
        'content',
        'slug',
        'user_id'
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
     * @return mixed
     */
    public function preview()
    {
        return $this->content;
    }
}
