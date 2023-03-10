<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        # $this->call(StarterSeeder::class);
        # $this->call(Programseeder::class);
        # $this->call(OsdcodeSeeder::class);
        $this->call(Studentinfoseeder::class);
        
        
    }
}
