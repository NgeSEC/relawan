<?php
/**
 * Created by PhpStorm.
 * User: dyangalih
 * Date: 2019-01-08
 * Time: 16:59
 */

namespace App\Repositories;


use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Database\QueryException;

/**
 * Class UserProfileRepository
 * @package App\Repositories
 */
class UserProfileRepository
{
    /**
     * @param $data
     * @param UserProfile $userProfile
     * @return User|bool
     */
    public function addUserProfile($data, UserProfile $userProfile)
    {
        $userResult = $this->getActiveUserProfileByIdentity($data->identity, $userProfile);
        if ($userResult != null) {
            return false;
        }
        try {
            $userProfile->identity = $data->identity;
            $userProfile->owner_id = $data->owner_id;
            $userProfile->email = $data->email;
            $userProfile->phone = $data->phone;
            $userProfile->phone_alternative = $data->phone_alternative;
            $userProfile->sex = $data->sex;
            $userProfile->address = $data->address;
            $userProfile->dob = $data->dob;
            $userProfile->timezone = $data->timezone;
            $userProfile->language_id = $data->language_id;
            $userProfile->picture_id = $data->avatar_id;
            $userProfile->user_id = $data->user_id;
            $userProfile->save();
            
            return $userProfile;
        } catch (QueryException $e) {
            report($e);
            return false;
        }
    }
    
    /**
     * @param $data
     * @param $id
     * @param UserProfile $user
     * @return mixed|null |null
     */
    public function updateUserProfile($data, $id, UserProfile $user)
    {
        try {
            $userProfile = $this->getActiveUserProfileByIdentityAndNotCurrentUser($data->identity, $id, $user);
            $objProfile = $this->getUserProfileById($id, $user);
            
            if ($userProfile == null && !empty($objProfile)) {
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
                return $objProfile;
            } else {
                return null;
            }
        } catch (QueryException $e) {
            report($e);
            return null;
        }
    }
    
    private function getColumn(UserProfile $userProfile)
    {
        return $userProfile->select(
            'user_profiles.id',
            'identity',
            'owner_id',
            'user_profiles.email',
            'phone',
            'phone_alternative',
            'sex',
            'address',
            'dob',
            'timezone',
            'language_id',
            'picture_id',
            'user_id'
        );
    }
    
    /**
     * @param $id
     * @param UserProfile $userProfile
     * @return mixed
     */
    public function getUserProfileById($id, UserProfile $userProfile)
    {
        return $userProfile->findOrFail($id);
    }
    
    /**
     * @param $identity
     * @param UserProfile $userProfile
     * @return mixed
     */
    private function getActiveUserProfileByIdentitySql($identity, UserProfile $userProfile)
    {
        return $this->getColumn($userProfile)->join('users', 'user_profiles.owner_id', '=', 'users.id')
            ->where('identity', $identity)
            ->where('users.status_id', '2');
    }
    
    /**
     * @param $identity
     * @param UserProfile $userProfile
     * @return mixed
     */
    public function getActiveUserProfileByIdentity($identity, UserProfile $userProfile)
    {
        return $this->getActiveUserProfileByIdentitySql($identity, $userProfile)->first();
    }
    
    /**
     * @param $identity
     * @param $id
     * @param UserProfile $userProfile
     * @return mixed
     */
    public function getActiveUserProfileByIdentityAndNotCurrentUser($identity, $id, UserProfile $userProfile)
    {
        return $this->getActiveUserProfileByIdentitySql($identity, $userProfile)
            ->where('user_profiles.id', '<>', $id)
            ->first();
    }
}