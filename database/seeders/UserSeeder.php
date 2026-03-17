<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        DB::table('user_infos')->insert([
            'User_Name' => 'ahmed1234',
            'email' => 'ahmed2@email.com',
            'password' => '123456',
            'role' => 1,
        ]);
        for ($x = 0; $x < 10; $x++) {
            DB::table('user_infos')->insert([
                'User_Name' => $faker->unique()->userName,
                'email' => Str::random(10).'@example.com',
                'password' => 'password',
                'role' => 1,
            ]);
        }
        DB::table('user_infos')->insert([
            'User_Name' => 'admin',
            'email' => 'admin@email.com',
            'password' => '123456',
            'role' => 2,
        ]);
    }
}
