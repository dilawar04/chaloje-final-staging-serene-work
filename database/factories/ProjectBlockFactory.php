<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ProjectBlock;
use Faker\Generator as Faker;

/*
 * ---------------------------------------------------------------------------------------------------------
 * Run: php artisan tinker
 * factory(App\ProjectBlock::class, 50)->create();
 * ---------------------------------------------------------------------------------------------------------
 */

$factory->define(ProjectBlock::class, function (Faker $faker) {
    return [
        'project_id' => $faker->name,
                'title' => $faker->name,
                'area' => $faker->name,
                'square_meter' => $faker->name,
                'floor_plans' => $faker->paragraph(3),
                'payment_plan' => $faker->name,
            ];

});
