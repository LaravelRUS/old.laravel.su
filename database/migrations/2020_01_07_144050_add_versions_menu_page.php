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
 * Class AddVersionsMenuPage
 */
class AddVersionsMenuPage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::table('versions', static function(Blueprint $t): void {
            $t->string('menu_page')
                ->default('documentation')
                ->after('title')
                ->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::table('versions', static function (Blueprint $t): void {
            $t->dropColumn('menu_page');
        });
    }
}
