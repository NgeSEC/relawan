<?php

namespace Tests\Unit\Models;

use App\Repositories\RoleRepository;
use Tests\TestCase;

class RoleTest extends TestCase
{
    private $roleRepository;
    
    private $objRole;
    
    public function start()
    {
        $this->objRole = new \StdClass;
    }
    
    private function getRoleRepository()
    {
        if ($this->roleRepository == null) {
            $this->roleRepository = new RoleRepository();
        }
        return $this->roleRepository;
    }
    
    public function createDummy()
    {
        $this->objRole->name = $this->getFaker()->word;
        $this->objRole->user_id = '1';
    }
    
    public function createRole()
    {
        $this->createDummy();
        return $this->getRoleRepository()->addRole($this->objRole);
    }
    
    public function setUp()
    {
        parent::setUp();
        $this->start();
    }
    
    public function testAddRole()
    {
        $result = $this->createRole();
        if (!$result) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
    }
}
