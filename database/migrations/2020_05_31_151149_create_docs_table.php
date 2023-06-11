<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('docs', static function (Blueprint $table): void {
            $table->increments('id');
            $table->unsignedInteger('version_id')
                ->comment('Relation to version identifier');
            $table->string('urn')
                ->comment('Documentation page urn (extracted from file name)');
            $table->string('title')
                ->comment('Documentation page title (h1 header)')
                ->nullable();
            $table->longText('content_source')
                ->comment('Original documentation page content (markdown)')
                ->nullable();
            $table->longText('content_rendered')
                ->comment('Original documentation page rendered content (html)')
                ->nullable();
            $table->string('content_commit')
                ->comment('Original documentation page commit hash')
                ->nullable();
            $table->longText('translation_source')
                ->comment('Translated documentation page content (markdown)')
                ->nullable();
            $table->longText('translation_rendered')
                ->comment('Translated documentation page rendered content (html)')
                ->nullable();
            $table->string('translation_commit')
                ->comment('Translated documentation page commit hash')
                ->nullable();
            $table->string('translation_commit_target')
                ->comment('Commit hash for which original documentation this translation was intended')
                ->nullable();
            $table->integer('translation_commit_diff')
                ->comment(
                    'The number of commits between the original file and the one for which the ' .
                    'translation is intended'
                )
                ->default(-1);

            $table->timestamp('created_at')
                ->useCurrent();
            $table->timestamp('updated_at')
                ->nullable();

            // Keys
            $table->foreign('version_id')
                ->references('id')
                ->on('versions');

            $table->unique(['urn', 'version_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('docs');
    }
};
