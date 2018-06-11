<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Artisan;
use App\Models\User;

class UserTest extends TestCase
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
        Artisan::call('db:seed');
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testAddDataUser()
    {
        $objData = new \StdClass;
        $objData->status_id = $this->faker->numberBetween(1,4);
        $objData->first_name = $this->faker->firstName();
        $objData->last_name = $this->faker->lastName();
        $objData->email = $this->faker->email();
        $objData->password = bcrypt($this->faker->password());
        $objData->provider = '';

        $objUser = new User;
        
        if($objUser->addUser($objData)){
            $this->assertTrue(true);
        }else{
            $this->assertTrue(false);
        }
    }
}
