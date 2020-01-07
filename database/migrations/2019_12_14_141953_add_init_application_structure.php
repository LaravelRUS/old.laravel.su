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
 * Class AddInitApplicationStructure
 */
class AddInitApplicationStructure extends Migration
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
            $table->text('description');
            $table->longText('text');
            $table->string('slug')->unique();
            $table->string('source_article_author')->nullable();
            $table->string('source_article_url')->nullable();
            $table->timestamp('published_at')->nullable()->index();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('docs', static function (Blueprint $table): void {
            $table->increments('id');
            $table->unsignedInteger('version_id')->index();
            $table->string('page')->index();
            $table->string('title')->nullable();
            $table->longText('text')->nullable();
            $table->string('last_commit')->nullable();
            $table->string('last_original_commit')->nullable();
            $table->string('current_original_commit')->nullable();
            $table->timestamp('last_commit_at')->nullable();
            $table->timestamp('last_original_commit_at')->nullable();
            $table->timestamp('current_original_commit_at')->nullable();
            $table->integer('original_commits_ahead')->nullable();
            $table->timestamps();
        });

        Schema::create('settings', static function (Blueprint $table): void {
            $table->increments('id');
            $table->string('key')->unique();
            $table->text('value');
        });

        Schema::create('versions', static function (Blueprint $table): void {
            $table->increments('id');
            $table->string('title')->index();
            $table->boolean('is_documented');
            $table->timestamps();
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
        Schema::dropIfExists('docs');
        Schema::dropIfExists('settings');
        Schema::dropIfExists('versions');
    }
}
