<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exercise_injury extends Model
{
    // use HasFactory;
    protected $table = 'exercise_injury';
    public $timestamps = false;
    protected $fillable = ['injury_id', 'exercise_id'];

    // public function exe()
    // {
    //     return $this->belongsToMany('Exercise');
    // }

    // public function ill()
    // {
    //     return $this->belongsToMany('Injury');
    // }

}
