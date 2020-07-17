<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Postagem;
use Faker\Generator as Faker;
use App\User;

$factory->define(Postagem::class, function (Faker $faker) {
    return [
         'titulo'=>$faker->name(),
         'descricao' => $faker->text($maxNbChars = 200),
         'anexo'=> $faker->fileExtension,
         'user_id'=>factory(User::class),
         'publicado'=>true,
         'slug'=>$faker->unique()->email(),
         'tipo_postagem'=>'edital',
    ];
});
