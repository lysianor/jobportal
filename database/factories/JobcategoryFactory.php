<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(App\Jobcategory::class, function (Faker $faker) {
    return [
      'jobcategory' => $faker->word
    ];
});
