<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Project;
use Faker\Generator as Faker;

/*
 * ---------------------------------------------------------------------------------------------------------
 * Run: php artisan tinker
 * factory(App\Project::class, 50)->create();
 * ---------------------------------------------------------------------------------------------------------
 */

$factory->define(Project::class, function (Faker $faker) {
    return [
        'title' => $faker->name,
                'logo' => $faker->image('assets/images/projects', 640, 480) ,
                'country' => $faker->country,
                'city_id' => $faker->name,
                'area_id' => $faker->name,
                'short_description' => $faker->name,
                'description' => $faker->paragraph(3),
                'price_from' => $faker->name,
                'price_to' => $faker->name,
                'developer_id' => $faker->name,
                'created' => $faker->name,
                'created_by' => $faker->name,
                'floor_plans' => $faker->paragraph(3),
                'payment_plans' => $faker->paragraph(3),
                'project_map' => $faker->name,
                'videos' => $faker->name,
            ];

});
