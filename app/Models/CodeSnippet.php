<?php

namespace App\Models;

use App\Models\Concerns\HasAuthor;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Prunable;
use Orchid\Metrics\Chartable;
use Orchid\Screen\AsSource;

class CodeSnippet extends Model
{
    use AsSource, Chartable, HasAuthor, HasFactory, HasUuids, Prunable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'content',
    ];

    /**
     * Get the query that represents the prunable data.
     *
     * @return mixed
     */
    public function prunable()
    {
        // Retrieve snippets older than one month
        return static::where('created_at', '<=', now()->subMonth());
    }
}
