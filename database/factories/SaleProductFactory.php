<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\SaleProduct;
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

$factory->define(SaleProduct::class, function (Faker $faker) {
  $price = $faker->numberBetween(1, 99);
  $qty = $faker->numberBetween(1, 10);
  $discount_type = $faker->optional()->randomElement(['value', 'percentual']);
  $discount = 0;
  if ($discount_type != null) {
    if ($discount_type == 'percentual') {
      $discount = $faker->numberBetween(0, 75);
      $total = ($qty * $price) * (1 - $discount / 100);
    } else {
      $discount = $faker->numberBetween(0, ($price * $qty) - 1);
      $total = ($qty * $price) - $discount;
    }
  } else {
    $total = $qty * $price;
  }
  return [
    'sale_id' => $faker->numberBetween(1, 150),
    'product_id' => $faker->numberBetween(1, 50),
    'price' => $price,
    'qty' => $qty,
    'discount_type' => $discount_type,
    'discount' => $discount,
    'total' => $total,
  ];
});
