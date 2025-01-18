<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Feature;
use Faker\Generator as Faker;

/*
 * ---------------------------------------------------------------------------------------------------------
 * Run: php artisan tinker
 * factory(App\Feature::class, 50)->create();
 * ---------------------------------------------------------------------------------------------------------
 */

$factory->define(Feature::class, function (Faker $faker) {
    return [
        'feature' => $faker->name,
            ];

});
