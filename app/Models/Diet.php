<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Diet extends Model {

	protected $table = 'diets';
	public $timestamps = false;
	protected $fillable = ['text','image','type'];

	public function trainee_ill()
	{
		return $this->hasMany('Diets_trainees_ill', 'diet_id');
	}

}