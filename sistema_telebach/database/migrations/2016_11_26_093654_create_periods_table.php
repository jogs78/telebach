<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeriodsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('periods', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('period');
			$table->date('start_period');
			$table->date('end_period');
			$table->date('start_vacation');
			$table->date('end_vacation');
			$table->date('capture_rating');
			$table->string('status');
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
		Schema::drop('periods');
	}

}
