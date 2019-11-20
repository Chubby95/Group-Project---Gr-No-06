<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableStudentDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('student_details', function (Blueprint $table) {
            $table->string('stu_prefix');
            $table->string('stu_subject_1');
            $table->string('stu_subject_2');
            $table->string('stu_subject_3');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('student_details', function (Blueprint $table) {
            $table->dropColumn('stu_prefix');
            $table->dropColumn('stu_subject_1');
            $table->dropColumn('stu_subject_2');
            $table->dropColumn('stu_subject_3');
        });
    }
}
