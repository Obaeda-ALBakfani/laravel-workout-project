<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Music extends Model {

	protected $table = 'music';
	public $timestamps = false;
	protected $fillable =['song'];

}