<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SignupDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
       $user =  App\User::create([
            'name' => 'ahmed',
            'fullname' => 'Ahmed Ogua',
            'phone' => '0272185090',
            'email' => 'admin@admin.com',
            'branncode' => 'WAL100',
            'img' => 'default/avatar.png',
            'password' => Hash::make('admin')
        ]);

       $user->assignRole('admin');
    }
}
