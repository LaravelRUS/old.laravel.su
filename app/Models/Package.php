<?php

namespace App\Models;

use App\Casts\PackageTypeEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Package extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'user_id',
        'name',
        'description',
        'packagist_name',
        'website',
        'type',
        'downloads',
        'stars',
        'approved',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'name'           => 'string',
        'description'    => 'string',
        'packagist_name' => 'string',
        'website'        => 'string',
        'type'           => PackageTypeEnum::class,
    ];
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
