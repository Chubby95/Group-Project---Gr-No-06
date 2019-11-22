<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentRenewTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('_student_renew', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('student_full_name');
            $table->string('student_id');
            $table->string('student_studing_level');
            $table->string('date_of_payment');
            $table->string('image_path');
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
        Schema::dropIfExists('_student_renew');
    }
}
