<?php

use Faker\Generator as Faker;

$factory->define(App\Models\CarBrand::class, function (Faker $faker) {
    return [
        'name' => $faker->company
    ];
});
