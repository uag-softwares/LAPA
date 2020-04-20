<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Visita;
use Faker\Generator as Faker;

$factory->define(Visita::class, function (Faker $faker) {
    return [
        'responsavel' => $faker->name,
        'data' => $faker->date,
        'hora_inicial' => $faker->time,
        'hora_final' => $faker->time,
        'descricao' => $faker->text,
        'telefone' => $faker->phoneNumber,
        'email' => $faker->safeEmail,
        'confirmada' => false,
    ];
});