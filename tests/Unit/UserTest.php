<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Artisan;
use App\Models\User;

class UserTest extends CoreUnitTest
{
    /**
     * setup migrate for dummy database
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        Artisan::call('migrate');
        Artisan::call('db:seed',array('--class' => 'FirstInstall'));
        Artisan::call('db:seed');
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testAddData()
    {
        $objData = new \StdClass;
        $objData->status_id = $data->status_id;
        $objData->first_name = $data->first_name;
        $objData->last_name = $data->last_name;
        $objData->email = $data->email;
        $objData->password = bcrypt($data->password);
        $objData->provider = $data->provider;

        $objUser = new User;
        
        if($objUser->addUserData($objData)){
            $this->assertTrue(true);
        }else{
            $this->assertTrue(false);
        }
    }
}
