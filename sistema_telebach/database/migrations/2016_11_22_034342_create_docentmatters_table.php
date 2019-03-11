<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocentmattersTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{	
		// Create table for associating docents to matters (Many-to-Many)
		Schema::create('docentmatters', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('docent_id')->unsigned()->foreign('docent_id')->references('id')->on('docents');
			$table->integer('matter_id')->unsigned()->foreign('matter_id')->references('id')->on('matters');
			$table->string('period')->nullbale();
			
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('docentmatters');
	}

}
