<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingTrait;
use Illuminate\Database\Eloquent\SoftDeletes;


class Injury extends Model {

	use HasFactory;
	protected $primarykey = 'id';
	protected $table = 'injuries';
	public $timestamps = false;
	protected $fillable = [
		'name',
	];

	use SoftDeletes;

	protected $dates = ['deleted_at'];

	public function trainee()
	{
		return $this->belongsToMany(Trainee::class,'trainee_ill','injury_id','trainee_id');
	}

	public function exe()
	{
		return $this->belongsToMany(Exercise::class,'exercise_injury','injury_id','Exercise_id');
	}

}