<?php
/**
 * Created by PhpStorm.
 * User: dyangalih
 * Date: 2019-01-08
 * Time: 16:44
 */

namespace App\Repositories;


use App\Models\User;
use Illuminate\Database\QueryException;

/**
 * Class UserRepository
 * @package App\Repositories
 */
class UserRepository
{
    /**
     * @param $response
     * @param User $user
     * @return User|null
     */
    public function addUser($response, User $user)
    {
        try {
            $user->status_id = $response->status_id;
            $user->name = $response->name;
            $user->email = $response->email;
            $user->password = bcrypt($response->password);
            $user->provider = $response->provider;
            
            $user->save();
            return $user;
        } catch (QueryException $e) {
            report($e);
            return null;
        }
    }
    
    /**
     * @param $email
     * @param User $user
     * @return mixed
     */
    public function getUserByEmail($email, User $user)
    {
        return $user->where('email', $email)->first();
    }
    
    /**
     * @param $email
     * @param $statusId
     * @param User $user
     * @return mixed|null
     */
    public function updateStatusUserByEmail($email, $statusId, User $user)
    {
        $objUser = $this->getUserByEmail($email, $user);
        
        if ($objUser != null) {
            try {
                $objUser->status_id = $statusId;
                $objUser->save();
                return $objUser;
            } catch (QueryException $e) {
                report($e);
                return null;
            }
        } else {
            return null;
        }
    }
}