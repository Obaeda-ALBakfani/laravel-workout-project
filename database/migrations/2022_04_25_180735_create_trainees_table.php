<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateTraineesTable extends Migration {

	public function up()
	{
		Schema::create('trainees', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('user_id')->unsigned();
			$table->string('gender');
			$table->float('height');
			$table->string('weight');
			$table->integer('level');
			$table->string('purpose');
		});
	}

	public function down()
	{
		Schema::drop('trainees');
	}
}