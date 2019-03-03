<?php

use App\Libs\RandomString;
use App\Models\User;
use Illuminate\Database\Seeder;
use WebAppId\User\Repositories\UserRepository;
use WebAppId\User\Services\Params\UserParam;

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
        $objNewUser = new UserParam();
        if ($userRepository->getUserByEmail('admin@posko.id', new User()) == null) {
    
            $objNewUser->setStatusId(2);
            $objNewUser->setName('admin posko');
            $objNewUser->setEmail('admin@posko.id');
            $objNewUser->setPassword($randomPassword);
            $result = $userRepository->addUser($objNewUser, new User());
            if ($result) {
                error_log("Default admin password : " . $randomPassword);
            } else {
                error_log('failed to create account default');
            }
        }
    }
}
