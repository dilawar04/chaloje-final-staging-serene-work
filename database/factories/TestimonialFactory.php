<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Testimonial;
use Faker\Generator as Faker;

/*
 * ---------------------------------------------------------------------------------------------------------
 * Run: php artisan tinker
 * factory(App\Testimonial::class, 50)->create();
 * ---------------------------------------------------------------------------------------------------------
 */

$factory->define(Testimonial::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
                'photo' => $faker->image('assets/images/testimonials', 640, 480) ,
                'testimonial' => $faker->name,
                'ordering' => $faker->randomDigit,
            ];

});
