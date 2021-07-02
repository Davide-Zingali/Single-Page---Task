<?php

use Illuminate\Database\Seeder;

use App\Task;

use App\User;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Task::class, 80)
        -> make()
        ->each(function($tasks) {
            $user = User::inRandomOrder() -> first();
            $tasks -> user() -> associate($user);
            $tasks -> save();
        });
    }
}
