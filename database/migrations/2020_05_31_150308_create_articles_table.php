<?php

/**
 * This file is part of laravel.su package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateArticlesTable
 */
class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('articles', static function (Blueprint $table): void {
            $table->increments('id');
            $table->string('title');
            $table->string('urn')
                ->unique();
            $table->text('description');
            $table->longText('content_source');
            $table->longText('content_rendered');
            $table->unsignedInteger('author_id')
                ->unsigned()
                ->index();
            $table->timestamp('published_at')
                ->nullable()
                ->index();
            $table->timestamp('created_at')
                ->useCurrent();
            $table->timestamp('updated_at')
                ->nullable();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
}
