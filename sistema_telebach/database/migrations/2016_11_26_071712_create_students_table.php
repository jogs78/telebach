<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('students', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('enrollment');
			$table->integer('age');
			$table->string('curp');
			$table->string('address');
			$table->string('email');
			$table->string('phone');
			$table->string('lapse');
			$table->string('gender');
			$table->string('status');
			$table->string('degree');
			$table->string('group');
			$table->string('password');
			$table->integer('user_id')->unsigned()->foreign('user_id')->references('id')->on('users');
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
		Schema::drop('students');
	}

}
