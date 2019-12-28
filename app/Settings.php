<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Settings
 *
 * @property int $id
 * @property string $key
 * @property string $value
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Settings newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Settings newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Settings query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Settings whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Settings whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Settings whereValue($value)
 * @mixin \Eloquent
 */
class Settings extends Model
{
    protected $table = "settings";
}
