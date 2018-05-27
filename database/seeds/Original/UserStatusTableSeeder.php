<?php

use App\Models\UserStatus;
use Illuminate\Database\Seeder;

class UserStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $userStatuses[] = array('name' => 'Non Active');
        $userStatuses[] = array('name' => 'Active');
        $userStatuses[] = array('name' => 'Disable');
        $userStatuses[] = array('name' => 'Block');
        
        for ($i = 0; $i < count($userStatuses); $i++) {
            $objUserStatus = new UserStatus;
            if (count($objUserStatus->getUserStatusesByName($userStatuses[$i])) == 0) {
                if (!$objUserStatus->addUserStatus((Object)$userStatuses[$i])) {
                    dd('failed insert');
                }
            } 
        }

    }
}
