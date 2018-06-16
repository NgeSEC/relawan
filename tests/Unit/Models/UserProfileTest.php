<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Models\UserProfile;

class UserProfileTest extends TestCase
{
    private $userProfile;
    private $objUserProfile;

    public function start(){
        $this->userProfile = new UserProfile;
        $this->objUserProfile = new \StdClass;
    }

    public function setUp(){
        parent::setUp();
        $this->start();
    }

    public function createDummy(){
        $this->objUserProfile->identity='1234567890';
        $this->objUserProfile->owner_id='1';
        $this->objUserProfile->email = $this->faker->email;
        $this->objUserProfile->phone = $this->faker->phoneNumber;
        $this->objUserProfile->phone_alternative = $this->faker->phoneNumber;
        $this->objUserProfile->sex='O';
        $this->objUserProfile->address = $this->faker->address;
        $this->objUserProfile->dob = $this->faker->date($format = 'Y-m-d', $max = 'now');
        $this->objUserProfile->timezone = '1';
        $this->objUserProfile->language_id = '1';
        $this->objUserProfile->avatar_id = '1';
        $this->objUserProfile->user_id = '1';
    }

    public function createUserProfile(){
        $this->createDummy();
        return $this->userProfile->addUserProfile($this->objUserProfile);
    }

    public function testAddProfile()
    {
        
        $result = $this->createUserProfile();
        
        if(!$result){
            $this->assertTrue(false);
        }else{
            $this->assertTrue(true);
        }
    }

    /**
     * Test add profile has double identity
     *
     * @return void
     */
    public function testAddProfileDoubleIdentity()
    {
        $result = $this->createUserProfile();
        $result = $this->userProfile->addUserProfile($this->objUserProfile);

        if(!$result){
            $this->assertFalse(false);
        }else{
            $this->assertFalse(true);
        }
    }

    /**
     * Test update profile
     *
     * @return void
     */
    public function testUpdateProfile()
    {
        $result = $this->createUserProfile();
        $this->createDummy();
        $result = $this->userProfile->updateUserProfile($this->objUserProfile, $result->id);

        if(!$result){
            $this->assertTrue(false);
        }else{
            $this->assertTrue(true);
        }
    }

}
