<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFathersTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('fathers', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('last_name');
			$table->string('phone');
			$table->string('email');
			$table->string('password');
			$table->integer('user_id')->unsigned()->foreign('user_id')->references('id')->on('users');
			$table->integer('student_id')->unsigned()->foreign('student_id')->references('id')->on('students');
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
		Schema::drop('fathers');
	}

}
