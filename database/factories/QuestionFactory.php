<?php

use App\Models\Question;
use Faker\Generator as Faker;

$factory->define(Question::class, function (Faker $faker) {
    return [
        'name_ar' => $faker->name,
        'name_en' => $faker->name,
        'notes_ar' => $faker->sentence,
        'notes_en' => $faker->sentence,
        'is_multi' => $faker->boolean,
        'is_dropdown' => $faker->boolean,
        'is_text' => $faker->boolean,
        'active' => $faker->boolean,
        'order' => $faker->numberBetween(1,99),
    ];
});
