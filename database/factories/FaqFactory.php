<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Faq;
use Faker\Generator as Faker;

/*
 * ---------------------------------------------------------------------------------------------------------
 * Run: php artisan tinker
 * factory(App\Faq::class, 50)->create();
 * ---------------------------------------------------------------------------------------------------------
 */

$factory->define(Faq::class, function (Faker $faker) {
    return [
        'question' => $faker->name,
                'answer' => $faker->paragraph(3),
                'ordering' => $faker->randomDigit,
            ];

});
