<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    protected $table = 'user_profiles';
    protected $fillable = [
        'id', 'identity', 'owner_id', 'email', 'phone', 'phone_alternative', 'sex', 'address', 'dob', 'timezone', 'language_id', 'picture_id', 'user_id',
    ];
    protected $hidden = ['created_at', 'updated_at'];

}
