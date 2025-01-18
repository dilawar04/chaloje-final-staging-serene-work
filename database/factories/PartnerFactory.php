<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Partner;
use Faker\Generator as Faker;

/*
 * ---------------------------------------------------------------------------------------------------------
 * Run: php artisan tinker
 * factory(App\Partner::class, 50)->create();
 * ---------------------------------------------------------------------------------------------------------
 */

$factory->define(Partner::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
                'logo' => $faker->image('assets/images/partners', 640, 480) ,
                'tag_line' => $faker->name,
                'description' => $faker->paragraph(3),
                'link' => $faker->name,
            ];

});
