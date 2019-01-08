<?php

use App\Libs\RandomString;
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Database\Seeder;

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
        $userRepository = new UserRepository();
        $objNewUser = new \StdClass;
        if ($userRepository->getUserByEmail('admin@posko.id', new User()) == null) {
            $objNewUser->status_id = '2';
            $objNewUser->name = 'admin posko';
            $objNewUser->email = 'admin@posko.id';
            $objNewUser->password = $randomPassword;
            $objNewUser->provider = '';
            $result = $userRepository->addUser($objNewUser, new User());
            if ($result) {
                error_log("Default admin password : " . $randomPassword);
            } else {
                error_log('failed to create account default');
            }
        }
    }
}
