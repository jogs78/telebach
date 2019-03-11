<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('groups', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name')->nullable();
			$table->string('lapse')->nullable();
			$table->integer('matter_id')->unsigned()->foreign('matter_id')->references('id')->on('matters');
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
		Schema::drop('groups');
	}

}
