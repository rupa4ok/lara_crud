<?php
use Faker\Generator as Faker;
$factory->define(\App\Models\Project::class, function (Faker $faker) {
    $title = $faker->sentence(rand(3, 8), true);
    $createdAt = $faker->dateTimeBetween('-2 mounth', '-3 mounth');
    
    $data = [
        'title' => $title,
        'created_at' => $createdAt,
        'updated_at' => $createdAt
    ];
    return $data;
});