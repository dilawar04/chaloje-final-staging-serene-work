<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Income;
use Faker\Generator as Faker;

/*
 * ---------------------------------------------------------------------------------------------------------
 * Run: php artisan tinker
 * factory(App\Income::class, 50)->create();
 * ---------------------------------------------------------------------------------------------------------
 */

$factory->define(Income::class, function (Faker $faker) {
    return [
        'user_id' => $faker->name,
                'rel_id' => $faker->name,
                'title' => $faker->name,
                'income_head' => $faker->name,
                'date' => $faker->name,
                'amount' => $faker->name,
                'created_at' => $faker->name,
                'created_by' => $faker->name,
                'note' => $faker->paragraph(3),
            ];

});
