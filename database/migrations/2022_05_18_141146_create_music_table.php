<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class CreateMusicTable extends Migration {

	public function up()
	{
		Schema::create('music', function(Blueprint $table) {
			$table->increments('id');
			$table->string('song');
		});
	}

	public function down()
	{
		Schema::drop('music');
	}
}