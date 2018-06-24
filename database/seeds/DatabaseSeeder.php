<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserStatusTableSeeder::class);
        $this->call(UserDefaultTableSeeder::class);
        $this->call(RoleTableSeeder::class);
        $this->call(TimeZoneTableSeeder::class);
        $this->call(PlaceSeeder::class);
    }
}
