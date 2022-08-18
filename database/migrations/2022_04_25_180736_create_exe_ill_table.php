<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateExeIllTable extends Migration {

	public function up()
	{
		Schema::create('exercise_injury', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('exercise_id')->unsigned();
			$table->integer('injury_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('exercise_injury');
	}
}