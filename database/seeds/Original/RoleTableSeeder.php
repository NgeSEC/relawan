<?php

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $roles[] = array('name'=>'Admin');
        $roles[] = array('name'=>'Voulenteer');
        $roles[] = array('name'=>'Member');

        for ($i=0; $i < count($roles); $i++) { 
            $objRole = new Role;
            $roles[$i]["user_id"] = "1";
            if(count($objRole->getRoleByName($roles[$i]['name']))==0){
                if(!$objRole->addRole((Object)$roles[$i])){
                    dd('add role failed');
                }
            }
        }
    }
}
