<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Currency;
use Faker\Generator as Faker;

/*
 * ---------------------------------------------------------------------------------------------------------
 * Run: php artisan tinker
 * factory(App\Currency::class, 50)->create();
 * ---------------------------------------------------------------------------------------------------------
 */

$factory->define(Currency::class, function (Faker $faker) {
    return [
        'currency' => $faker->name,
                'short_name' => $faker->name,
                'symbol' => $faker->name,
            ];

});
