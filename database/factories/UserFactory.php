<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(App\User::class, function (Faker $faker) {
  return [
    'first_name' => $faker->firstName,
    'last_name' => $faker->lastName,
    'email' => $faker->unique()->safeEmail,
    'password' => '$2y$10$hJHcKmhaa6JMCTzlV3bC0Ov82b.RYJG7d8V6pOov9lmYEZXmwQV6C',
    'verified' => 1,
    'gender' =>  'Male',
    'birthday' => $faker->date($format = 'Y-m-d', $max = 'now'),
    'nationality' => 'Filipino',
    'address' => $faker->streetAddress,
    'state' => $faker->state,
    'city' => $faker->city,
    'contact_number' => '09175654561',
    'interest' => 'IT - Software',
    'description' => 'I am a person who is positive about every aspect of life. There are many things I like to do, to see, and to experience. I like to read, I like to write; I like to think, I like to dream; I like to talk, I like to listen'
  ];
});
