<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Order;
use Faker\Generator as Faker;

/*
 * ---------------------------------------------------------------------------------------------------------
 * Run: php artisan tinker
 * factory(App\Order::class, 50)->create();
 * ---------------------------------------------------------------------------------------------------------
 */

$factory->define(Order::class, function (Faker $faker) {
    return [
        'order_number' => $faker->name,
                'customer_id' => $faker->name,
                'status' => $faker->name,
                'created' => $faker->name,
                'discount' => $faker->name,
                'other_amount' => $faker->name,
                'total_amount' => $faker->name,
                'note' => $faker->paragraph(3),
                'created_by' => $faker->name,
            ];

});
