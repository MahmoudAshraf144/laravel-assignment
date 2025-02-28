<?php

namespace Database\Seeders;

use App\Models\Task;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = User::factory(10)->create();

        // Task::factory()->create(
        //     [
        //         'user_id' => User::first()->id,
        //     ]
        // );

        Task::factory()->create(
            [
                'user_id' => User::first()->id,
                'title' => 'Task 1',
                'status' => 'pending',
            ]
        );

        Task::factory()->create(
            [
                'user_id' => User::first()->id,
                'title' => 'Task 2',
                'status' => 'in_progress',
            ]
        );

        Task::factory()->create(
            [
                'user_id' => User::first()->id,
                'title' => 'Task 3',
                'status' => 'completed',
            ]
        );
    }
}
