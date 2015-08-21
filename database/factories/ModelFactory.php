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
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Quit::class, function (Faker\Generator $faker) {
    return [
        'quit_date' => $faker->dateTimeBetween('-45 days', 'now'),
        'packs_per_week' => $faker->numberBetween(1,4),
        'cigarettes_per_pack' => $faker->numberBetween(15,25),
        'cost_per_pack' => $faker->randomFloat(2,5,10),
    ];
});
