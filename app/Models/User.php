<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = ['id', 'status_id', 'name', 'email', 'password'];

    protected $hidden = ['password', 'remember_token', 'created_at', 'updated_at'];
    
}
