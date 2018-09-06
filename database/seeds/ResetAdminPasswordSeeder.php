<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Libs\RandomString;

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
        

        $user = new User;
        $userData = $user->getUserByEmail('admin@posko.id');

        if($userData!=null){
            $userData->password = $randomPassword;
            error_log("Default admin password change into : " . $randomPassword);
        }
    }
}
