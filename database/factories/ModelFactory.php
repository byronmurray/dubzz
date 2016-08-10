<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->unique()->name,
        'role' => 'staff',
        'email' => $faker->unique()->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});


$factory->define(App\Task::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->unique()->bs,
        'user_id' => rand(1, 10),
        'body' => $faker->realText($maxNbChars = 10000, $indexSize = 2),
    ];
});


$factory->define(App\Process::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->unique()->jobTitle,
        'user_id' => rand(1, 10),
        'process_id' => 0,
    ];
});
