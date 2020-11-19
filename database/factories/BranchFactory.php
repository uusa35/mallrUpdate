<?php

use App\Models\Area;
use App\Models\Branch;
use App\Models\Country;
use App\Models\User;
use Faker\Generator as Faker;

$fakerAr = \Faker\Factory::create('ar_JO');
$factory->define(Branch::class, function (Faker $faker) use ($fakerAr) {
    return [
        'name_ar' => $faker->name,
        'name_en' => $faker->name,
        'address_ar' => $faker->address,
        'address_en' => $faker->address,
        'phone' => $faker->bankAccountNumber,
        'mobile' => $faker->bankAccountNumber,
        'description_en' => $faker->sentence,
        'description_ar' => $fakerAr->realText(100),
        'user_id' => User::all()->random()->id,
        'country_id' => function ($array) {
            return User::whereId($array['user_id'])->first()->country->id;
        },
        'area_id' => function ($array) {
            return Country::whereId($array['country_id'])->first()->areas()->first()->id;
        },
    ];
});
