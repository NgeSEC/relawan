<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Libs\RandomString;

class UserDefaultTableSeeder extends Seeder
{
    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $randomString = new RandomString();
        $randomPassword = $randomString->generateRandomString();
        //
        $objUser = new User;
        $objNewUser = new \StdClass;
        if($objUser->getUserByEmail('admin@posko.id')==null){
            $objNewUser->status_id = '2';
            $objNewUser->name = 'admin posko';
            $objNewUser->email = 'admin@posko.id';
            $objNewUser->password = $randomPassword;
            $objNewUser->provider = '';
            $result = $objUser->addUser($objNewUser);
            if($result){
                error_log("Default admin password : " . $randomPassword);
            }
        }
    }
}
