<?php

use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up(): void
    {
        DB::unprepared(<<<'SQL'
            CREATE TYPE history_types AS ENUM ('source', 'translation');
            SQL);
    }

    public function down(): void
    {
        DB::unprepared('DROP TYPE history_types;');
    }
};
