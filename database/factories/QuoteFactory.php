<?php

use App\Models\Area;
use App\Models\Quote;
use Faker\Generator as Faker;

$factory->define(Quote::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'mobile' => $faker->bankAccountNumber,
        'event_time' => $faker->dateTimeThisMonth(),
        'total_individuals' => $faker->numberBetween(1,20),
        'budget_individual' => $faker->numberBetween(2,10),
        'area_id' => Area::all()->random()->id,
        'type' => $faker->name,
        'status' => $faker->randomElement(['pending','closed','delivered']),
    ];
});
