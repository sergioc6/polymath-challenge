<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
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
        User::insert(
            [
                [
                    'name' => 'Sergio Cabral',
                    'email' => 'sergiocabral.1990@gmail.com',
                    'email_verified_at' => now(),
                    'password' => Hash::make('123456'), // password
                    'remember_token' => Str::random(10),
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                    ],
                [
                    'name' => 'Juan Roman Riquelme',
                    'email' => 'juanromanriquelme@gmail.com',
                    'email_verified_at' => now(),
                    'password' => Hash::make('123456'), // password
                    'remember_token' => Str::random(10),
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'name' => 'Martin Palermo',
                    'email' => 'martinpalermo@gmail.com',
                    'email_verified_at' => now(),
                    'password' => Hash::make('123456'), // password
                    'remember_token' => Str::random(10),
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
            ]
        );
    }
}
