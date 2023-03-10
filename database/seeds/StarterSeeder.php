<?php

use Illuminate\Database\Seeder;

class StarterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $user = new \App\User([
            "name"=> "Ahmed Ahia",
            "email" => "admin@admin.com",
            "password" => '$2y$10$Fz49xstzCuFchU1noiwHredHhBpe7wjEa0pWQ6KcqCzvow.ORvy6C'  
        ]);

        $user->save();

    }
}
