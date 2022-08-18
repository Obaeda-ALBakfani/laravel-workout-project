<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Trainee extends Model 
{
    use  HasApiTokens , HasFactory;


    protected $table = 'trainees';
    public $timestamps = true;
    protected $guarded = [ ];
    protected $fillable = [
        'gender',
        'height',
        'weight',   
        'level',
        'purpose',
        'user_id',

    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id'); 
    }

    public function ill()
    {
        return $this->belongsToMany(Injury::class,'trainee_ill','trainee_id','injury_id');   
     }
    public function exe()
    {
        return $this->belongsToMany('Trainee_exe', 'trainee_id');
    }

}