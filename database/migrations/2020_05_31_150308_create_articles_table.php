<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('articles', static function (Blueprint $table): void {
            $table->uuid('id')
                ->primary();
            $table->string('title');
            $table->string('urn')
                ->unique();
            $table->text('description');
            $table->longText('content_source');
            $table->longText('content_rendered');
            $table->uuid('author_id')
                ->nullable()
                ->index();
            $table->dateTimeTz('published_at')
                ->nullable()
                ->index();
            $table->dateTimeTz('created_at')
                ->useCurrent();
            $table->dateTimeTz('updated_at')
                ->nullable();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
