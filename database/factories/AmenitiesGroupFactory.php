<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\AmenitiesGroup;
use Faker\Generator as Faker;

/*
 * ---------------------------------------------------------------------------------------------------------
 * Run: php artisan tinker
 * factory(App\AmenitiesGroup::class, 50)->create();
 * ---------------------------------------------------------------------------------------------------------
 */

$factory->define(AmenitiesGroup::class, function (Faker $faker) {
    return [
        'title' => $faker->name,
                'icon' => $faker->image('assets/images/amenities_groups', 640, 480) ,
            ];

});
