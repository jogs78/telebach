<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvaluationsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('evaluations', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('matter');
			$table->string('student');
			$table->string('calification');
			$table->string('examen');
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
		Schema::drop('evaluations');
	}

}
