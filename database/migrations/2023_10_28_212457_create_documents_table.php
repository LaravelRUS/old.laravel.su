<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->uuid('id');
            $table->string('version', 7);
            $table->string('file');
            $table->unsignedInteger('count_commits_behind')->default(0)->comment('count commits behind current');
            $table->string('current_commit', 64)->nullable();
            $table->string('last_commit', 64)->nullable();
            $table->timestamps();


            $table->unique(['version', 'file']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};
