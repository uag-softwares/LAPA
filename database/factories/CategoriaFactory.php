<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Categoria;
use Faker\Generator as Faker;

$factory->define(Categoria::class, function (Faker $faker) {
    return [
        'nome' => $faker->word,
        'disciplina_id' => factory(App\Disciplina::class),
        'slug' => $faker->unique()->email(),
    ];
});
