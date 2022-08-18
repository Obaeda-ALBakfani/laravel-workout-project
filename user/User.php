<?php

namespace User;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;

class User extends Model 
{

    protected $table = 'users';
    public $timestamps = true;

    use SoftDeletes , HasApiTokens , HasFactory, Notifiable;

    protected $dates = ['deleted_at'];
    protected $guarded = array('Email', 'password');
    protected $visible = array('name', 'Email', 'role');
    protected $hidden = [array('password'),'remember_token'];
    protected $fillable = [
        'name',
        'Email',
        'password',
        'role'
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function trainee()
    {
        return $this->hasOne('Trainee');
    }

}