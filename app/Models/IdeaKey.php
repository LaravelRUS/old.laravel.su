<?php

namespace App\Models;

use App\Models\Concerns\HasAuthor;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Metrics\Chartable;

class IdeaKey extends Model
{
    use Chartable, HasAuthor, HasFactory, HasUuids;

    /**
     * Get the idea request associated with the idea key.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function request(): BelongsTo
    {
        return $this->belongsTo(IdeaRequest::class, 'request_id');
    }
}
