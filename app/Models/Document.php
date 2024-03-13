<?php

namespace App\Models;

use App\Docs;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory, HasUuids;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'version',
        'file',
        'behind',
        'current_commit',
        'last_commit',
    ];

    /**
     * The default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'version' => Docs::DEFAULT_VERSION,
        'behind'  => null,
    ];

    /**
     * Get the URL to edit the page on GitHub.
     *
     * @return string The URL to edit the page on GitHub.
     */
    public function getEditUrl(): string
    {
        return sprintf('https://github.com/%s/edit/%s/%s', config('services.github.repos.docs'), $this->version, $this->file);
    }
}
