<?php

namespace App\Models\Concerns;

use Illuminate\Database\Eloquent\Builder;

trait Approvable
{
    /**
     * Scope a query to only include approved items.
     *
     * @param Builder $query
     * @param bool    $approved
     *
     * @return Builder
     */
    public function scopeApproved(Builder $query, bool $approved = true): Builder
    {
        return $query->where('approved', $approved);
    }

    /**
     * Verify if the current item is approved.
     *
     * @return bool
     */
    public function isApproved(): bool
    {
        return $this->attributes['approved'] === 1 || $this->attributes['approved'] === true;
    }
}
