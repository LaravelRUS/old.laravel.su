<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Documentation
 *
 * @property int $id
 * @property int $version_id
 * @property string $page
 * @property string|null $title
 * @property string|null $text
 * @property string|null $last_commit
 * @property string|null $last_original_commit
 * @property string|null $current_original_commit
 * @property \Illuminate\Support\Carbon|null $last_commit_at
 * @property \Illuminate\Support\Carbon|null $last_original_commit_at
 * @property \Illuminate\Support\Carbon|null $current_original_commit_at
 * @property int|null $original_commits_ahead
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\FrameworkVersion $version
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Documentation byVersion($version)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Documentation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Documentation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Documentation orderByLastCommit()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Documentation page($pageTitle)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Documentation query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Documentation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Documentation whereCurrentOriginalCommit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Documentation whereCurrentOriginalCommitAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Documentation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Documentation whereLastCommit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Documentation whereLastCommitAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Documentation whereLastOriginalCommit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Documentation whereLastOriginalCommitAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Documentation whereOriginalCommitsAhead($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Documentation wherePage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Documentation whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Documentation whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Documentation whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Documentation whereVersionId($value)
 * @mixin \Eloquent
 */
class Documentation extends Model
{
    protected $table = "docs";

    protected $guarded = [];

    protected $dates = [
        'last_commit_at',
        'last_original_commit_at',
        'current_original_commit_at'
    ];

    public function scopeByVersion(Builder $query, $version)
    {
        if ($version instanceof FrameworkVersion) {
            return $query->where('version_id', $version->id);
        }

        return $query->whereHas('version', function (Builder $q) use ($version) {
            return $q->where("title", $version);
        });
    }

    public function scopeOrderByLastCommit(Builder $query)
    {
        return $query->orderBy("last_commit_at", 'desc');
    }

    public function scopePage(Builder $query, $pageTitle)
    {
        return $query->where("page", $pageTitle);
    }

    public function version()
    {
        return $this->belongsTo(FrameworkVersion::class, "version_id");
    }

}
