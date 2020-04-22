<?php

use App\Models\Property;
use Faker\Generator as Faker;

$factory->define(Property::class, function (Faker $faker) {
    return [
        'name_ar' => $faker->name,
        'name_en' => $faker->name,
        'description_ar' => $faker->sentence,
        'description_en' => $faker->sentence,
        'image' => 'user-' . $faker->numberBetween(1, 5) . '.jpg',
        'icon' => $faker->randomElement(['users', 'comments', 'cogs', 'eye', 'heart', 'glass', 'flag', 'print', 'cog', 'asterisk','gears','magic']),
        'order' => $faker->numberBetween(1, 99),
        'is_checkbox' => $faker->boolean,
        'is_text' => $faker->boolean,
        'value' => $faker->randomDigit,
        'active' => $faker->boolean(true),
        'on_home' => $faker->boolean(true),
    ];
});
