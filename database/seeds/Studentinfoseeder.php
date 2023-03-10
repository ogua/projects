<?php

use App\Studentinfo;
use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Traits\assignRole;

class Studentinfoseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        # factory(App\Studentinfo::class, 500)->create();
        $users = factory(App\User::class, 600)
           ->create()
           ->each(function ($user) {
                $user->assignRole('Student');
                $indexnumber = $user->indexnumber;
                $user->studentinfos()->save(factory(App\Studentinfo::class)->create(
                    [
                        'indexnumber'=> $indexnumber,
                        'email' => $user->email,
                        'fullname' => $user->name
                    ]
                ));
            });
    }
}
