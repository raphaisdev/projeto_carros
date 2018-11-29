<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Advert::class, function (Faker $faker) {
    return [
        'user_id' => function () {
            return factory(App\Models\User::class)->create()->id;
        },
        'car_model_id' => function () {
            return factory(App\Models\CarModel::class)->create()->id;
        },
        'title' => $faker->text(100),
        'description' => $faker->text(200),
        'value' => $faker->randomFloat(2,1000,1000000),
        'year' => $faker->year('now'),
        'color' => $faker->colorName(),
        'picture' => '/adverts/mock.jpg',
        'status'=> $faker->randomElement([0,1,2])
    ];
});
