<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCalificationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('califications', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_partial');
            $table->string('second_partial');
            $table->string('third_partial');
            $table->integer('student_id')->unsigned();
            $table->integer('matter_id')->unsigned();
            $table->foreign('student_id')->references('id')->on('students');
            $table->foreign('matter_id')->references('id')->on('matters');
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
        Schema::drop('califications');
    }
}
