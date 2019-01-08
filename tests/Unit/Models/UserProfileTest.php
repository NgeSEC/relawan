<?php

namespace Tests\Unit\Models;

use App\Models\UserProfile;
use App\Repositories\UserProfileRepository;
use Tests\TestCase;

/** TODO - This class haven't fix there is error on User Profile Repository */
class UserProfileTest extends TestCase
{
    private $userProfileRepository;
    private $objUserProfile;
    
    public function start()
    {
        $this->objUserProfile = new \StdClass;
    }
    
    public function getUserProfileRepository()
    {
        if ($this->userProfileRepository == null) {
            $this->userProfileRepository = new UserProfileRepository();
        }
        return $this->userProfileRepository;
    }
    
    public function setUp()
    {
        parent::setUp();
        $this->start();
    }
    
    public function createDummy()
    {
        $this->objUserProfile->identity = '1234567890';
        $this->objUserProfile->owner_id = '1';
        $this->objUserProfile->email = $this->getFaker()->email;
        $this->objUserProfile->phone = $this->getFaker()->phoneNumber;
        $this->objUserProfile->phone_alternative = $this->getFaker()->phoneNumber;
        $this->objUserProfile->sex = 'O';
        $this->objUserProfile->address = $this->getFaker()->address;
        $this->objUserProfile->dob = $this->getFaker()->date($format = 'Y-m-d', $max = 'now');
        $this->objUserProfile->timezone = '1';
        $this->objUserProfile->language_id = '1';
        $this->objUserProfile->avatar_id = '1';
        $this->objUserProfile->user_id = '1';
    }
    
    public function createUserProfile()
    {
        $this->createDummy();
        return $this->getUserProfileRepository()->addUserProfile($this->objUserProfile, new UserProfile());
    }
    
    public function testAddProfile()
    {
        
        $result = $this->createUserProfile();
    
        if (!$result) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
    }
    
    
    public function testAddProfileDoubleIdentity()
    {
        $result = $this->createUserProfile();
        $result = $this->getUserProfileRepository()->addUserProfile($this->objUserProfile, new UserProfile());
    
        if (!$result) {
            $this->assertFalse(false);
        } else {
            $this->assertFalse(true);
        }
    }
    
    
    public function testUpdateProfile()
    {
        $result = $this->createUserProfile();
        $this->createDummy();
        $result = $this->getUserProfileRepository()->updateUserProfile($this->objUserProfile, $result->id, new UserProfile());
    
        if (!$result) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
    }
    
}
