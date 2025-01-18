<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ProjectProperty;
use Faker\Generator as Faker;

/*
 * ---------------------------------------------------------------------------------------------------------
 * Run: php artisan tinker
 * factory(App\ProjectProperty::class, 50)->create();
 * ---------------------------------------------------------------------------------------------------------
 */

$factory->define(ProjectProperty::class, function (Faker $faker) {
    return [
        'project_id' => $faker->name,
                'type_id' => $faker->name,
                'title' => $faker->name,
                'area' => $faker->name,
                'square_meter' => $faker->name,
                'price' => $faker->name,
                'bedrooms' => $faker->name,
                'bathrooms' => $faker->name,
                'floor_plans' => $faker->paragraph(3),
                'payment_plan' => $faker->name,
            ];

});
