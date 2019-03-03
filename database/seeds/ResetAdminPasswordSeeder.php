<?php

use App\Libs\RandomString;
use App\Models\User;
use Illuminate\Database\Seeder;
use WebAppId\User\Repositories\UserRepository;

class ResetAdminPasswordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $randomString = new RandomString();
        $randomPassword = $randomString->generateRandomString();
    
        $userRepository = new UserRepository();
        $userData = $userRepository->getUserByEmail('admin@posko.id', new User());
    
        if ($userData != null) {
            $userData->password = bcrypt($randomPassword);
            $userData->save();
            error_log("Default admin password change into : " . $randomPassword);
        }
    }
}
