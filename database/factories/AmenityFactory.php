<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Amenity;
use Faker\Generator as Faker;

/*
 * ---------------------------------------------------------------------------------------------------------
 * Run: php artisan tinker
 * factory(App\Amenity::class, 50)->create();
 * ---------------------------------------------------------------------------------------------------------
 */

$factory->define(Amenity::class, function (Faker $faker) {
    return [
        'title' => $faker->name,
                'code' => $faker->name,
                'icon' => $faker->image('assets/images/amenities', 640, 480) ,
                'ordering' => $faker->randomDigit,
                'group_id' => $faker->name,
            ];

});
