<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('docs', static function (Blueprint $table): void {
            $table->addColumn('string[]', 'keywords')
                ->comment('List of document keywords')
                ->default('{}')
                ->length(191)   // 191 char per keyword
                ->size(15)      // 15 items per array
            ;
        });
    }

    public function down(): void
    {
        Schema::table('docs', static function (Blueprint $table): void {
            $table->dropColumn('keywords');
        });
    }
};
