<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateTraineeExeTable extends Migration {

	public function up()
	{
		Schema::create('trainee_exe', function(Blueprint $table) {
			$table->integer('trainee_id')->unsigned();
			$table->integer('exercise_id')->unsigned();
			$table->integer('extra_rep')->default('0');
		});
	}

	public function down()
	{
		Schema::drop('trainee_exe');
	}
}