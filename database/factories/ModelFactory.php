<?php

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

$factory->define(desabafai\domains\User\User::class, function (Faker $faker) {
    static $password;

    return [
        'nickname'  => $faker->unique()->firstName,
        'email'     => $faker->unique()->safeEmail,
        'avatar'    => $faker->firstName,
        'term_use' => 1,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(desabafai\domains\Post\Post::class, function (Faker $faker) {
    return [
        'title'   => $faker->sentence($nbWords = 6, $variableNbWords = true) ,
        'body'    => $faker->text($maxNbChars = 200),
        'user_id' => rand(1,50)
    ];
});

$factory->define(desabafai\domains\Comment\Comment::class, function (Faker $faker) {
    return [
        'title'   => $faker->sentence($nbWords = 6, $variableNbWords = true) ,
        'body'    => $faker->text($maxNbChars = 200),
        'user_id' => rand(1,50)
    ];
});

