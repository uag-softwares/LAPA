<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Material;
use App\Disciplina;
use Faker\Generator as Faker;

$factory->define(Material::class, function (Faker $faker) {
    return [
        'titulo'=>$faker->word(),
        'texto' => $faker->text($maxNbChars = 200),
        'anexo'=> $faker->fileExtension,
        'disciplina_id'=>factory(Disciplina::class),
    ];
});
