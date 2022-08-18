<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Trainee_exe extends Model 
{

    protected $table = 'trainee_exe';
    public $timestamps = false;

    public function trainee()
    {
        return $this->belongsTo('Trainee');
    }

    public function exe()
    {
        return $this->belongsTo('Exercise');
    }

}