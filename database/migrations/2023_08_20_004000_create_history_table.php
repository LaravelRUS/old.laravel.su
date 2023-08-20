<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Schema\Grammars\PostgresGrammar;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        PostgresGrammar::macro('typeHistory_types', fn (): string => 'history_types');

        Schema::create('history', function (Blueprint $table) {
            $table->uuid('id')
                ->primary();

            $table->uuid('version_id')
                ->comment('Relation to version identifier');

            $table->string('commit')
                ->comment('History item commit hash')
                ->nullable();

            $table->addColumn('history_types', 'type')
                ->comment('Type of the history entry');

            $table->dateTimeTz('created_at')
                ->useCurrent();
            $table->dateTimeTz('updated_at')
                ->nullable();

            // Keys
            $table->foreign('version_id')
                ->references('id')
                ->on('versions');

            $table->index(['version_id', 'type']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('history');
    }
};
