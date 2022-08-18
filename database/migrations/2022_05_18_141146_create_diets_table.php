<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class CreateDietsTable extends Migration {

	public function up()
	{
		Schema::create('diets', function(Blueprint $table) {
			$table->increments('id');
			$table->text('text');
			$table->string('image');
			$table->string('type');
		});
	}

	public function down()
	{
		Schema::drop('diets');
	}
}