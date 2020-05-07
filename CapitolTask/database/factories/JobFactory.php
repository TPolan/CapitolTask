<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Job;
use Faker\Generator as Faker;

$factory->define(Job::class, function (Faker $faker) {
    return [
        'job_code'    => $faker->unique()->numberBetween(1, 250),
        'name'        => $faker->unique()->jobTitle,
        'description' => $faker->paragraph
    ];
});

