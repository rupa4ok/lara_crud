<?php
use Faker\Generator as Faker;
$factory->define(\App\Models\Task::class, function (Faker $faker) {
    $name = $faker->sentence(rand(3, 8), true);
    $project_id = $faker->numberBetween($min = 1, $max = 10);
    $createdAt = $faker->dateTimeBetween('-2 mounth', '-3 mounth');
    
    $data = [
        'name' => $name,
        'completed' => 1,
        'project_id' => $project_id,
        'created_at' => $createdAt,
        'updated_at' => $createdAt
    ];
    return $data;
});