<?php

namespace Tests\Unit\Models;

use App\Models\Role;
use Tests\TestCase;

class RoleTest extends TestCase
{
    private $role;

    private $objRole;

    public function start()
    {
        $this->role = new Role;
        $this->objRole = new \StdClass;
    }

    public function createDummy()
    {
        $this->objRole->name = $this->faker->word;
        $this->objRole->user_id = '1';
    }

    public function createRole()
    {
        $this->createDummy();
        return $this->role->addRole($this->objRole);
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
