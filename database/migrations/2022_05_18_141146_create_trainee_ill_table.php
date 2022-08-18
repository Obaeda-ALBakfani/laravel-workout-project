<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class CreateTraineeIllTable extends Migration {

	public function up()
	{
		Schema::create('trainee_ill', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('trainee_id')->unsigned();
			$table->integer('injury_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('trainee_ill');
	}
}