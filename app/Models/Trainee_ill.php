<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trainee_ill extends Model {

	protected $table = 'trainee_ill';
	public $timestamps = false;
	protected $fillable = [  'trainee_id ' , 'injury_id'];
	public function trainee()
	{
		return $this->belongsTo('Trainee');
	}

	// public function ill()
	// {
	// 	return $this->belongsTo('Injury');
	// }

	// public function diet()
	// {
	// 	return $this->hasMany('Diets_trainees_ill', 'trainee_ill_id');
	// }

}