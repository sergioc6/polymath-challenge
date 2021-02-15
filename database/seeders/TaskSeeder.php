<?php

namespace Database\Seeders;

use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();
        $faker = Faker::create();

        foreach ($users as $user) {
            for ($i = 0; $i <= 50; $i++) {
                Task::create([
                    'title' => $faker->streetName,
                    'description' => $faker->text,
                    'user_id' => $user->id
                ]);
            }
        }
    }
}
