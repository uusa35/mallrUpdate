<?php

use App\Models\Answer;
use Faker\Generator as Faker;

$factory->define(Answer::class, function (Faker $faker) {
    return [
        'name_ar' => $faker->name,
        'name_en' => $faker->name,
        'value' => $faker->sentence,
        'icon' => $faker->randomElement(['users', 'home', 'inbox']),
        'active' => $faker->boolean(true),
        'is_multi' => $faker->boolean(),
        'order' => $faker->numberBetween(1, 99),
    ];
});
