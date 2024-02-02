<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Prunable;

class CodeSnippet extends Model
{
    use HasFactory, HasUuids, Prunable;

    /**
     * @var array
     */
    protected $fillable = [
        'content',
    ];

    /**
     * @return mixed
     */
    public function prunable()
    {
        return static::where('created_at', '<=', now()->subMonth());
    }
}
