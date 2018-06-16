<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Artisan;
use App\Models\User;

class UserTest extends TestCase
{
    private $objUser;
    private $user;

    /**
     * setup migrate for dummy database
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->objUser = new \StdClass;
        $this->user = new User;
    }

    public function getObjUser(){
        return $this->objUser;
    }

    public function createDummy(){
        $this->objUser->status_id = $this->faker->numberBetween(1,4);
        $this->objUser->name = $this->faker->name();
        $this->objUser->email = $this->faker->email();
        $this->objUser->password = $this->faker->password();
        $this->objUser->provider = '';
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testAddDataUser()
    {
        $this->createDummy();
        
        if($this->user->addUser($this->objUser)){
            $this->assertTrue(true);
        }else{
            $this->assertTrue(false);
        }
    }

    public function testGetUserByEmail(){
        $this->createDummy();
        
        if($this->user->addUser($this->objUser)){
            $result = $this->user->getUserByEmail($this->objUser->email);
            if($result!=null){
                $this->assertTrue(true);
                $this->assertEquals($this->objUser->status_id,$result->status_id);
                $this->assertEquals($this->objUser->name,$result->name);
                $this->assertEquals($this->objUser->email,$result->email);
            }else{
                $this->assertTrue(false);
            }
            
        }else{
            $this->assertTrue(false);
        }
    }
}
