<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ProjectBlockCategory;
use Faker\Generator as Faker;

/*
 * ---------------------------------------------------------------------------------------------------------
 * Run: php artisan tinker
 * factory(App\ProjectBlockCategory::class, 50)->create();
 * ---------------------------------------------------------------------------------------------------------
 */

$factory->define(ProjectBlockCategory::class, function (Faker $faker) {
    return [
        'category' => $faker->name,
                'block_id' => $faker->name,
                'payment_plan' => $faker->name,
            ];

});
