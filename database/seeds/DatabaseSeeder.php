<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;
use WebAppId\SmartNotify\SmartNotify;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SmartNotify::push('test');
        $this->call(UserStatusTableSeeder::class);
        $this->call(UserDefaultTableSeeder::class);
        $this->call(RoleTableSeeder::class);
        $this->command->getOutput()->writeln("<info>Seeding: webappid:content:seed</info>");
        Artisan::call('webappid:content:seed');
        
        $this->call(PlaceTypeSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(PlaceSeeder::class);
    }
}
