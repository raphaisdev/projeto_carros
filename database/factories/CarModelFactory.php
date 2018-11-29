<?php

use Faker\Generator as Faker;

$factory->define(App\Models\CarModel::class, function (Faker $faker) {
    return [
        'car_brand_id' => function () {
            return factory(App\Models\CarBrand::class)->create()->id;
        },
        'name' => $faker->word
    ];
});
