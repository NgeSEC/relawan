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

        $this->command->getOutput()->writeln("<info>Seeding: webappid:content:seed</info>");
        \Illuminate\Support\Facades\Artisan::call('webappid:content:seed');

        $this->call(PlaceSeeder::class);
    }
}
