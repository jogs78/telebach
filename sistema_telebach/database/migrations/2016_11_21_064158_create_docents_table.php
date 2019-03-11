<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocentsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('docents', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('mother_last_name');
			$table->string('father_last_name');
			$table->string('gender');
			$table->string('email')->nullable();
			$table->string('phone')->nullable();
			$table->string('home')->nullable();
			$table->string('level_of_study')->nullable();
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
		Schema::drop('docents');
	}

}
