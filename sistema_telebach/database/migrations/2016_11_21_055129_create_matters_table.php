<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMattersTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('matters', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name')->nullable();
			$table->string('key')->nullable();
			$table->string('description')->nullable();
			$table->string('unit')->nullable();
			$table->string('semester')->nullable();
			$table->integer('degree_id')->unsigned()->foreign('degree_id')->references('id')->on('degrees');
			$table->integer('docent_id')->unsigned()->foreign('docent_id')->references('id')->on('docents');
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
		Schema::drop('matters');
	}

}
