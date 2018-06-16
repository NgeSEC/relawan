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

    public function addUserProfile($data)
    {
        $userProfile = $this->getActiveUserProfileByIdentity($data->identity);
        if($userProfile!=null){
            return false;
        }

        try {
            $this->identity = $data->identity;
            $this->owner_id = $data->owner_id;
            $this->email = $data->email;
            $this->phone = $data->phone;
            $this->phone_alternative = $data->phone_alternative;
            $this->sex = $data->sex;
            $this->address = $data->address;
            $this->dob = $data->dob;
            $this->timezone = $data->timezone;
            $this->language_id = $data->language_id;
            $this->picture_id = $data->avatar_id;
            $this->user_id = $data->user_id;
            $this->save();
            return $this;
        } catch (\Exception $e) {
            report($e);
            return false;
        }
    }

    public function updateUserProfile($data, $id)
    {
        $userProfile = $this->getActiveUserProfileByIdentityAndNotCurrentUser($data->identity, $id);
        if($userProfile!=null){
            return false;
        }
        try {
            $objProfile = $this->getUserProfileById($id);
            if (!empty($objProfile)) {
                $objProfile->identity = $data->identity;
                $objProfile->owner_id = $data->owner_id;
                $objProfile->email = $data->email;
                $objProfile->phone = $data->phone;
                $objProfile->phone_alternative = $data->phone_alternative;
                $objProfile->sex = $data->sex;
                $objProfile->address = $data->address;
                $objProfile->dob = $data->dob;
                $objProfile->timezone = $data->timezone;
                $objProfile->language_id = $data->language_id;
                $objProfile->picture_id = $data->avatar_id;
                $objProfile->user_id = $data->user_id;
                $objProfile->save();
                return true;
            } else {
                return false;
            }
        } catch (\Exception $e) {
            report($e);
            return false;
        }
    }

    public function getUserProfileById($id)
    {
        return $this->findOrFail($id);
    }

    private function getActiveUserProfileByIdentitySql($identity)
    {
        return $this->join('users', 'user_profiles.owner_id', '=', 'users.id')
            ->where('identity', $identity)
            ->where('users.status_id', '2');
    }

    public function getActiveUserProfileByIdentity($identity)
    {
        return $this->getActiveUserProfileByIdentitySql($identity)->first();
    }

    public function getActiveUserProfileByIdentityAndNotCurrentUser($identity, $id)
    {
        return $this->getActiveUserProfileByIdentitySql($identity)
            ->where('user_profiles.id','<>',$id)
            ->first();
    }

}
