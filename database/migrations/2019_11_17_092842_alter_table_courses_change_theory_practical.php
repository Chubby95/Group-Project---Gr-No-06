<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableCoursesChangeTheoryPractical extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->dropColumn('theory');
            $table->dropColumn('practical');
        });
        Schema::table('courses', function (Blueprint $table) {
            $table->tinyInteger('theory')->default('0');
            $table->tinyInteger('practical')->default('0');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('courses', function (Blueprint $table) { });
    }
}
