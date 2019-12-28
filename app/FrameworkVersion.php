<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * App\FrameworkVersion
 *
 * @property int $id
 * @property string $title
 * @property int $is_documented
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Documentation[] $documentation
 * @property-read int|null $documentation_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FrameworkVersion newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FrameworkVersion newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FrameworkVersion query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FrameworkVersion version($version)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FrameworkVersion whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FrameworkVersion whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FrameworkVersion whereIsDocumented($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FrameworkVersion whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FrameworkVersion whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class FrameworkVersion extends Model
{
    protected $table = "versions";
    protected $fillable = ["title", "is_documented"];

    public function scopeVersion(Builder $query, $version)
    {
    	return $query->where("title", $version);
    }

    public function documentation()
    {
        return $this->hasMany(Documentation::class, "version_id");
    }

    public static function documentedVersions()
    {
        return FrameworkVersion::query()
            ->where("is_documented", 1)
            ->orderBy("title", "desc")
            ->get();
    }

}
