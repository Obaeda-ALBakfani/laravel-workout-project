<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exercise extends Model 
{

    protected $table = 'exercises';
    public $timestamps = false;
    protected $fillable = ['name','description', 'img', 'set', 'rep', 'muscle', 'purpose', 'rest_time', 'exe_time', 'level'];

    public function trainee()
    {
        return $this->hasMany('Trainee_exe', 'exe_id');
    }

    public function ill()
    {
        return $this->belongsToMany(Injury::class,'exercise_injury','Exercise_id','injury_id');
    }

}