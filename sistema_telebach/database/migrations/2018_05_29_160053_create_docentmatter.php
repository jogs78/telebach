<?php

use Illuminate\Database\Migrations\Migration;

class CreateDocentmatter extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('docent_group_class', function ($table) {
            $table->increments('id');
            $table->integer('period_id');
            $table->integer('matter_id');
            $table->integer('group_id');
            $table->integer('docent_id');

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
        Schema::drop('docent_group_class');

    }
}
