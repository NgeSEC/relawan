<?php

namespace Tests\Unit\Models;

use App\Models\User;
use App\Repositories\UserRepository;
use Tests\TestCase;

class UserTest extends TestCase
{
    private $objUser;
    private $userRepository;
    
    /**
     * setup migrate for dummy database
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->objUser = new \StdClass;
    }
    
    public function getUserRepository()
    {
        if ($this->userRepository == null) {
            $this->userRepository = new UserRepository();
        }
        
        return $this->userRepository;
    }
    
    public function getObjUser()
    {
        return $this->objUser;
    }
    
    public function createDummy()
    {
        $this->objUser->status_id = $this->getFaker()->numberBetween(1, 4);
        $this->objUser->name = $this->getFaker()->name();
        $this->objUser->email = $this->getFaker()->email();
        $this->objUser->password = $this->getFaker()->password();
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
    
        if ($this->getUserRepository()->addUser($this->objUser, new User())) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    
    public function testGetUserByEmail()
    {
        $this->createDummy();
        
        if ($this->getUserRepository()->addUser($this->objUser, new User())) {
            $result = $this->getUserRepository()->getUserByEmail($this->objUser->email, new User());
            if ($result != null) {
                $this->assertTrue(true);
                $this->assertEquals($this->objUser->status_id, $result->status_id);
                $this->assertEquals($this->objUser->name, $result->name);
                $this->assertEquals($this->objUser->email, $result->email);
            } else {
                $this->assertTrue(false);
            }
            
        } else {
            $this->assertTrue(false);
        }
    }
    
    public function testUpdateUserByEmail()
    {
        $this->createDummy();
        
        if ($this->getUserRepository()->addUser($this->objUser, new User())) {
            $result = $this->getUserRepository()->updateStatusUserByEmail($this->objUser->email, $this->getFaker()->numberBetween(1, 4), new User());
            if ($result) {
                $this->assertTrue(true);
            } else {
                $this->assertTrue(false);
            }
        } else {
            $this->assertTrue(false);
        }
    }
}
