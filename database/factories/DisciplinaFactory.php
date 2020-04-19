<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Disciplina;
use Faker\Generator as Faker;
use App\User;
$factory->define(Disciplina::class, function (Faker $faker) {
    return [
        'nome'=>$faker->word(),
        'user_id'=>factory(User::class),
    ];
});
