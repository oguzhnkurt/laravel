<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name'  => 'Ömer',
                'email' => 'omer@gmail.com',
                'password' => bcrypt('Omer123456')
            ],
            [
                'name' => 'Oguzhan',
                'email' => 'oguz@gmail.com',
                'password' => bcrypt('Oguz123456')
            ]
        ]);
    }
}
