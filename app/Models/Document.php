<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory, HasUuids;

    /**
     * @var string[]
     */
    protected $fillable = [
        'id',
        'version',
        'file',
        'behind',
        'current_commit',
        'last_commit',
    ];
}
