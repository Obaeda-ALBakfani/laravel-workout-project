<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class CreateDietsTraineesIllTable extends Migration {

	public function up()
	{
		Schema::create('diets_trainees_ill', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('diet_id')->unsigned();
			$table->integer('trainee_ill_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('diets_trainees_ill');
	}
}