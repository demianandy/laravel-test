<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            "0" => [
                "name" => "Дмитрий",
                "email" => "admin@gmail.com",
                "password" => bcrypt("123456"),
                "is_admin" => "1",
            ],
        ];

        foreach($users as $user){
            User::create($user);
        }
    }
}
