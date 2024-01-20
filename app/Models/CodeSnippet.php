<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CodeSnippet extends Model
{
    use HasFactory, HasUuids;

    /**
     * @var array
     */
    protected $fillable = [
        'content',
    ];
}
