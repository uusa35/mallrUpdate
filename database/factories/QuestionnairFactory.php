<?php

use App\Models\Questionnaire;
use App\Models\Survey;
use App\Models\User;
use Faker\Generator as Faker;

$factory->define(Questionnaire::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'mobile' => $faker->phoneNumber,
        'email' => $faker->email,
        'is_order' => $faker->boolean,
        'notes' => $faker->paragraph,
        'price' => $faker->randomFloat(3, 10, 200),
        'net_price' => $faker->randomFloat(3, 10, 200),
        'survey_id' => Survey::all()->random()->id,
        'user_id' => User::all()->random()->id,
        'client_id' => User::all()->random()->id
    ];
});
