<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Disciplina;
use Faker\Generator as Faker;

$factory->define(Disciplina::class, function (Faker $faker) {
    return [
        'nome' => $faker->name,
        'user_id' => factory(App\User::class),
        'slug' => $faker->unique()->email(),
    ];
});

$factory->state(Disciplina::class, 'no_user', function ($faker) {
    return [
        'nome' => $faker->name,
        'user_id' => null,
        'slug' => $faker->unique()->email(),
    ];
});
