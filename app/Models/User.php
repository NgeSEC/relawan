<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;

class User extends Model
{
//
    protected $table = 'users';
    protected $fillable = ['id', 'status_id', 'name', 'first_name', 'last_name', 'email'];
    protected $hidden = ['password', 'created_at', 'updated_at'];

    public function addUser($response)
    {
        try {
            $this->status_id = $response->status_id;
            $this->first_name = $response->first_name;
            $this->last_name = $response->last_name;
            $this->email = $response->email;
            $this->password = bcrypt($response->password);
            $this->provider = $response->provider;
            return $this->save();
        } catch (QueryException $e) {
            report($e);
            return false;
        }
    }

    public function getUserByEmail($email){
        return $this->where('email', $email)->get();
    }
}
