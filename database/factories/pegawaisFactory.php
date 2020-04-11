<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Pegawai;
use Faker\Generator as Faker;

$factory->define(App\Pegawai::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'gender' => $faker->randomElement(['male', 'female']),
        'email' => $faker->unique()->safeEmail,
        'address' => $faker->address,
    ];
});
