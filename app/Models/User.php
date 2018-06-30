<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\QueryException;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = ['id', 'status_id', 'name', 'email', 'password'];

    protected $hidden = ['password', 'remember_token', 'created_at', 'updated_at'];

    public function addUser($response)
    {
        try {
            $this->status_id = $response->status_id;
            $this->name      = $response->name;
            $this->email     = $response->email;
            $this->password  = bcrypt($response->password);
            $this->provider  = $response->provider;

            return $this->save();
        } catch (QueryException $e) {
            report($e);
            return false;
        }
    }

    public function getUserByEmail($email)
    {
        return $this->where('email', $email)->first();
    }

    public function updateStatusUserByEmail($email, $statusId)
    {
        $objUser = $this->getUserByEmail($email);
        
        if ($objUser != null) {
            try {
                $objUser->status_id = $statusId;
                $objUser->save();
                return true;
            } catch (QueryException $e) {
                report($e);
                return false;
            }
        } else {
            return false;
        }
    }
}
