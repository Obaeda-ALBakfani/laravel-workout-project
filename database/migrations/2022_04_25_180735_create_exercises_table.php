<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExercisesTable extends Migration {

	public function up()
	{
		Schema::create('exercises', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->text('description');
			$table->text('img');
			$table->integer('set');
			$table->integer('rep');
			$table->string('muscle');
			$table->integer('level');
		});
	}

	public function down()
	{
		Schema::drop('exercises');
	}
}