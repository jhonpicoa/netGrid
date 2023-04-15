<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         DB::table('users')->insert([
            'name' => 'pico',
            'email' => 'pico@gemail.com',
            'password' => Hash::make('123456789'),
            'address' => 'asjhjjada',
            'birthdate' => '2020-05-19',
            'city' => 'yopal',
         ]);
    }
}
