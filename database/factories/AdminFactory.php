<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(App\Admin::class, function (Faker $faker) {
  return [
    'company' => 'Admin',
    'email' => 'admin@admin.com',
    'password' => '$2y$10$7Xn/8bPJ89ypj0cIxwoH9OOXnbK/.9xrLfFh2G4LUSRkw6j7Agn0K',
    'logo' =>  'default.png',
    'created_at' => '2019-09-24 19:16:02',
    'updated_at' => '2019-09-24 19:16:02',
  ];
});