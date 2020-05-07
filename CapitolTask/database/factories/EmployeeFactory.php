<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Employee;
use Faker\Generator as Faker;

$factory->define(Employee::class, function (Faker $faker) {
    return [
        'personal_number' => $faker->unique()->numberBetween(1, 250),
        'first_name'      => $faker->firstName,
        'last_name'       => $faker->unique()->lastName,
    ];
});
