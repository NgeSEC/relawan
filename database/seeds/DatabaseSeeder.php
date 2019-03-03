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
        $this->command->getOutput()->writeln("<info>Seeding: webappid:user:seed</info>");
        Artisan::call('webappid:user:seed');
        $this->call(UserDefaultTableSeeder::class);
        $this->command->getOutput()->writeln("<info>Seeding: webappid:content:seed</info>");
        Artisan::call('webappid:content:seed');
        
        $this->call(PlaceTypeSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(PlaceSeeder::class);
    }
}
