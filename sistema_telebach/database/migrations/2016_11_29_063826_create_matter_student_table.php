<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatterStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matter_student', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('matter_id')->unsigned();
            $table->integer('student_id')->unsigned();

            $table->foreign('matter_id')->references('id')->on('matters');
            $table->foreign('student_id')->references('id')->on('students');
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
        Schema::drop('matter_student');
    }
}
