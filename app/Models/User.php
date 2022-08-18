<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;
use Auth;

class User extends Model 
{
    use SoftDeletes , HasApiTokens ,HasFactory ;

    protected $primaryKey = 'id';
    protected $table = 'users';
    public $timestamps = true;
    protected $dates = ['deleted_at'];
    protected $hidden = array('password','remember_token');
    protected $fillable = [
        'name',
        'Email',
        'password',
        'role',
    ];
    public function trainee()
    {
        return $this->hasOne('Trainee');
    }

}