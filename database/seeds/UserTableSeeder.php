<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([[
            'id'=> 1,
            'name' => str_random(10),
            'email' => str_random(10).'@gmail.com',
            'password' => bcrypt('secret'),
            'is_admin' => false
        ],
        [
            'id'=> 2,
            'name' => str_random(10),
            'email' => str_random(10).'@gmail.com',
            'password' => bcrypt('secret'),
            'is_admin' => false
        ],
        [
            'id'=> 3,
            'name' => str_random(10),
            'email' => str_random(10).'@gmail.com',
            'password' => bcrypt('secret'),
            'is_admin' => false
        ],
        [
            'id'=> 4,
            'name' => str_random(10),
            'email' => str_random(10).'@gmail.com',
            'password' => bcrypt('secret'),
            'is_admin' => false
        ],
        [
            'id'=> 5,
            'name' => str_random(10),
            'email' => str_random(10).'@gmail.com',
            'password' => bcrypt('secret'),
            'is_admin' => false
        ],
        [
            'id'=> 6,
            'name' => str_random(10),
            'email' => str_random(10).'@gmail.com',
            'password' => bcrypt('secret'),
            'is_admin' => false
        ],
        [
            'id'=> 7,
            'name' => str_random(10),
            'email' => str_random(10).'@gmail.com',
            'password' => bcrypt('secret'),
            'is_admin' => false
        ],
        [
            'id'=> 8,
            'name' => str_random(10),
            'email' => str_random(10).'@gmail.com',
            'password' => bcrypt('secret'),
            'is_admin' => false
        ],
        [
            'id'=> 9,
            'name' => str_random(10),
            'email' => str_random(10).'@gmail.com',
            'password' => bcrypt('secret'),
            'is_admin' => false
        ],
        [
            'id'=> 10,
            'name' => 'omid',
            'email' => str_random(10).'@gmail.com',
            'password' => 123,
            'is_admin' => true
        ]]);
    }
}
