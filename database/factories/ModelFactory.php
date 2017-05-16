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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'username' => $faker->unique()->username,
        'password' => $password ?: $password = bcrypt('12345678'),
        'remember_token' => str_random(10),
        'phone' => $faker->phoneNumber,
        'address' => $faker->address,
    ];
});

$factory->state(App\User::class, 'owner', function ($faker) {
    return [
        'type' => 'OWNER',
    ];
});

$factory->state(App\User::class, 'customer', function ($faker) {
    return [
        'type' => 'CUSTOMER',
    ];
});

$factory->define(App\CarType::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->unique()->name,
    ];
});

$factory->define(App\Car::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'car_number' => $faker->unique()->name,
        'car_type_id' => App\CarType::all()->random()->id,
    ];
});

$factory->define(App\Booking::class, function (Faker\Generator $faker) {
    return [
        'user_id' => App\User::customer()->get()->random()->id,
        'car_id' => App\Car::free()->get()->random()->id,
        'price' => $faker->randomElement([500000, 1000000, 1500000, 2000000]),
        'date_start' => \Carbon\Carbon::now(),
        'date_finish' => \Carbon\Carbon::now()->addWeeks(rand(1, 52)),
    ];
});
