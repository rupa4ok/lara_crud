<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(TaskTableSeeder::class);
        factory(\App\Models\Project::class, 10)->create();
        factory(\App\Models\Task::class, 100)->create();
    }
}
