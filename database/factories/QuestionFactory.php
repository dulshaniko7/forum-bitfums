<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use App\Question;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Question::class, function (Faker $faker) {
    $title = $faker->sentence;
    $body = $faker->realText(100,2);
    return [
        'title' =>$title,
        'slug' => str::slug($title,'-'),
        'body' => $body,
        'category_id' => function(){
            return Category::all()->random();
        },
        'user_id' => function() {
            return User::all()->random();
        }

    ];
});
