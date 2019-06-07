<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;
use App\Noticia;

$factory->define(Noticia::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'body' => $faker->text
    ];
});
