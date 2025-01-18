<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\PropertyType;
use Faker\Generator as Faker;

/*
 * ---------------------------------------------------------------------------------------------------------
 * Run: php artisan tinker
 * factory(App\PropertyType::class, 50)->create();
 * ---------------------------------------------------------------------------------------------------------
 */

$factory->define(PropertyType::class, function (Faker $faker) {
    return [
        'parent_id' => $faker->name,
                'type' => $faker->name,
                'ordering' => $faker->randomDigit,
                'image' => $faker->image('assets/images/property_types', 640, 480) ,
            ];

});
