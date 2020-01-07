<?php

/**
 * This file is part of laravel.su package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App;

use GrahamCampbell\Markdown\Facades\Markdown;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Article
 */
class Article extends Model
{
    use SoftDeletes;

    /**
     * @var string
     */
    protected $table = 'articles';

    /**
     * @var array|string[]
     */
    protected $dates = [
        'published_at'
    ];

    /**
     * TODO Избавиться от фасадов!
     *
     * @return mixed
     */
    public function displayContentHtml()
    {
        return Markdown::convertToHtml($this->text);
    }
}
