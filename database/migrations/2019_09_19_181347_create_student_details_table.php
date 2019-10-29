<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('users_id')->uniqe();
            $table->string('stu_index_n0');
            $table->string('stu_register_no');
            $table->string('stu_full_name');
            $table->string('stu_address_jaffna');
            $table->string('stu_address_perment');
            $table->string('stu_styding_year');
            $table->string('stu_gender');
            $table->string('stu_mobile');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_details');
    }
}
