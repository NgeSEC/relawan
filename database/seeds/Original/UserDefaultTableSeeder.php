<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UserDefaultTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $objUser = new User;
        $objNewUser = new \StdClass;
        if(count($objUser->getUserByEmail('admin'))==0){
            $objNewUser->status_id = '2';
            $objNewUser->first_name = 'admin';
            $objNewUser->last_name = 'posko';
            $objNewUser->email = 'admin@posko.id';
            $objNewUser->password = 'adminPOSKO2018';
            $objNewUser->provider = '';
            $objUser->addUser($objNewUser);
        }
    }
}
