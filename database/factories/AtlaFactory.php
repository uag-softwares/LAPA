<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Atla;
use Faker\Generator as Faker;

$factory->define(Atla::class, function (Faker $faker) {
    return [
        'titulo'=>$faker->word(),
        'descricao' => $faker->text($maxNbChars = 200),
        'anexo'=> $faker->fileExtension,
        'publicado' => $faker->boolean($chanceOfGettingTrue = 50),
        'categoria_id' => factory(App\Categoria::class),
    ];
});
