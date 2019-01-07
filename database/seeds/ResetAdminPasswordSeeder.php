<?php

use App\Libs\RandomString;
use App\Models\User;
use Illuminate\Database\Seeder;

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
            $userData->password = bcrypt($randomPassword);
            $userData->save();
            error_log("Default admin password change into : " . $randomPassword);
        }
    }
}
