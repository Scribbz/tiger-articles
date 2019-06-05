<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Article::class, function (Faker $faker) {
    return [
        //Play around with the data
        'title' => $faker -> text(50),
        'body' => $faker -> text(500)
    ];
});
