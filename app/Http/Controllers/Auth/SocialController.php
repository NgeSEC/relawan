<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Crypt;

use App\User;
use App\Models\Social;
use App\Models\UserRoles;
use App\Models\DynamicRedirect;

class SocialController extends Controller
{
    public function getSocialRedirect( $provider, $redirect )
    {
        session()->reflash();
        session()->keep('redirect_full_path');

        session([
            'redirect' => $redirect
        ]);

        $providerKey = Config::get('services.' . $provider);
        if (empty($providerKey)) {
            return view('pages.status')
                ->with('error','No such provider');
        }
        return Socialite::driver( $provider )->redirect();
    }

    public function getSocialHandle($provider, Social $social, User $user)
    {
        $redirect_full_path = session('redirect_full_path');
        $redirect_after = session('redirectAfter');

        if($redirect_full_path==""){
            $redirect = session('redirect');
            $dynamicRedirect = new DynamicRedirect;
            $redirect = $dynamicRedirect->getDynamicRedirectByCode($redirect);
        }

        if (Input::get('denied') != '') {
            return redirect()->to('login')
                ->with('status', 'danger')
                ->with('message', 'You did not share your profile data with our app.');
        }
        $userData = Socialite::driver( $provider )->user();
        $socialUser = null;
        //Check is this email present
        $email = $userData->email;
        $userCheck = $user->getUserByEmail($email);
        
        if (!$userData->email) {
            $email = 'missing' . str_random(10);
        }
        
        if (!empty($userCheck)) {
            $socialUser = $userCheck;
        }
        else {
            
            $sameSocialId = $social->getSocialBySocialIdAndProvider($userData->id, $provider);
            if (empty($sameSocialId)) {
                
                //There is no combination of this social id and provider, so create new one
                $new_user = new \StdClass;
                $new_user->status_id = 2;
                $new_user->provider = $provider;
                $new_user->password = bcrypt(str_random(16));
                $new_user->email = $email;
                $new_user->name = $userData->name;
                
                $add_new_user = $user->addUser($new_user);

                if(!isset($userData->id)){
                    $userData->id = random(10);
                }
                
                $socialData = new \StdClass;
                $socialData->user_id = $user->getLastId()->id;
                $socialData->social_id = $userData->id;
                $socialData->provider= $provider;
                
                $social->addDataSocial($socialData);
                
                $socialUser = $add_new_user;

                $userRoleData = new \StdClass;
                $userRoleData->user_id = $socialData->user_id;
                $userRoleData->role_id = '3';/** hardocode for default a member */

                $userRoles = new UserRoles();
                $userRoles->addUserRole($userRoleData);
            }
            else {
                //Load this existing social user
                $socialUser = $sameSocialId->user;
            }
        }
        
        auth()->login($socialUser, true);
        if($redirect_full_path!=""){
            return redirect($redirect_full_path);
        }elseif($redirect_after != ""){
            return redirect($redirect_after);
        }else{
            $route = route($redirect[0]->route);
            return redirect($route);
        }
    }
}