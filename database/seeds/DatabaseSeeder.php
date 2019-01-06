<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;

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
        
        $this->command->getOutput()->writeln("<info>Seeding: webappid:content:seed</info>");
        Artisan::call('webappid:content:seed');
        
        $this->call(CategorySeeder::class);
        $this->call(PlaceSeeder::class);
    }
}
