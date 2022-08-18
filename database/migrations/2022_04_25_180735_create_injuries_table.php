<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInjuriesTable extends Migration {

	public function up()
	{
		Schema::create('injuries', function(Blueprint $table) {
			$table->increments('id');
			$table->softDeletes();
			$table->string('name')->unique();
		});
	}

	public function down()
	{
		Schema::drop('injuries');
	}
}