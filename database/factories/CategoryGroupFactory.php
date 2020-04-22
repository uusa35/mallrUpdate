<?php

use App\Models\Category;
use App\Models\CategoryGroup;
use Faker\Generator as Faker;

$factory->define(CategoryGroup::class, function (Faker $faker) {
    return [
        'name_ar' => $faker->name,
        'name_en' => $faker->name,
        'active' => $faker->boolean(true),
        'is_multi' => $faker->boolean,
        'order' => $faker->numberBetween(1, 5),
        'image' => 'user-' . $faker->numberBetween(1, 5) . '.jpg',
        'icon' => $faker->randomElement(['users', 'comments', 'cogs', 'eye', 'heart', 'glass', 'flag', 'print', 'cog', 'asterisk','gears','magic']),
    ];
});
