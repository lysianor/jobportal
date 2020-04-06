<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(App\Tag::class, function (Faker $faker) {
    return [
        'tag' => $faker->word
    ];
});
