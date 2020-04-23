<?php

use App\Models\Term;
use Faker\Generator as Faker;

$factory->define(Term::class, function (Faker $faker) {
    return [
        'title_ar' => $faker->name,
        'title_en' => $faker->name,
        'content_ar' => $faker->paragraph,
        'content_en' => $faker->paragraph,
    ];
});
