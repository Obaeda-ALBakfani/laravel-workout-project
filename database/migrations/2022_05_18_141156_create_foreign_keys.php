<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('trainee_ill', function(Blueprint $table) {
			$table->foreign('trainee_id')->references('id')->on('trainees')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('trainee_ill', function(Blueprint $table) {
			$table->foreign('injury_id')->references('id')->on('injuries')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('trainees', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('trainee_exe', function(Blueprint $table) {
			$table->foreign('trainee_id')->references('id')->on('trainees')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('trainee_exe', function(Blueprint $table) {
			$table->foreign('exercise_id')->references('id')->on('exercises')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('exercise_injury', function(Blueprint $table) {
			$table->foreign('exercise_id')->references('id')->on('exercises')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('exercise_injury', function(Blueprint $table) {
			$table->foreign('injury_id')->references('id')->on('injuries')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('diets_trainees_ill', function(Blueprint $table) {
			$table->foreign('diet_id')->references('id')->on('diets')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('diets_trainees_ill', function(Blueprint $table) {
			$table->foreign('trainee_ill_id')->references('id')->on('trainee_ill')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
	}

	public function down()
	{
		Schema::table('trainee_ill', function(Blueprint $table) {
			$table->dropForeign('trainee_ill_trainee_id_foreign');
		});
		Schema::table('trainee_ill', function(Blueprint $table) {
			$table->dropForeign('trainee_ill_injury_id_foreign');
		});
		Schema::table('trainees', function(Blueprint $table) {
			$table->dropForeign('trainees_user_id_foreign');
		});
		Schema::table('trainee_exe', function(Blueprint $table) {
			$table->dropForeign('trainee_exe_trainee_id_foreign');
		});
		Schema::table('trainee_exe', function(Blueprint $table) {
			$table->dropForeign('trainee_exe_exercise_id_foreign');
		});
		Schema::table('exercise_injury', function(Blueprint $table) {
			$table->dropForeign('exe_ill_exercise_id_foreign');
		});
		Schema::table('exercise_injury', function(Blueprint $table) {
			$table->dropForeign('exe_ill_injury_id_foreign');
		});
		Schema::table('diets_trainees_ill', function(Blueprint $table) {
			$table->dropForeign('diets_trainees_ill_diet_id_foreign');
		});
		Schema::table('diets_trainees_ill', function(Blueprint $table) {
			$table->dropForeign('diets_trainees_ill_trainee_ill_id_foreign');
		});
	}
}