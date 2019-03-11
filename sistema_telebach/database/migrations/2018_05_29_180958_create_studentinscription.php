<?php

use Illuminate\Database\Migrations\Migration;

class CreateStudentinscription extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_inscription', function ($table) {
            $table->increments('id');
            $table->integer('student_id');
            $table->integer('period_id');
            $table->integer('group_id');

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
        Schema::drop('student_inscription');

    }
}
