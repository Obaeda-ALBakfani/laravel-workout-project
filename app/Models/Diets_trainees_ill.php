<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Diets_trainees_ill extends Model {

	protected $table = 'diets_trainees_ill';
	public $timestamps = false;

	public function trainee_ill()
	{
		return $this->belongsTo('Trainee_ill');
	}

	public function diet()
	{
		return $this->belongsTo('Diet');
	}

}