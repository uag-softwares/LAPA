<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Visita;
use Faker\Generator as Faker;

$factory->define(Visita::class, function (Faker $faker) {
    return [
        'data' => $faker->date,
        'hora_inicial' => $faker->time,
        'hora_final' => $faker->time,
        'descricao' => $faker->text,
        'confirmada' => false,
        'user_id' => factory(App\User::class),
    ];
});