<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Sale;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Sale::class, function (Faker $faker) {
  return [
    'customer_id' => $faker->numberBetween(1, 50),
    'status' => $faker->randomElement(['sold', 'cancel', 'returned', null]),
    'total' => 0,
    'date' => $faker->dateTimeBetween('now', '+1 month'),
  ];
});
