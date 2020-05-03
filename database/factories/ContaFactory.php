<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Conta;
use App\User;
use Faker\Generator as Faker;

$factory->define(Conta::class, function (Faker $faker) {
    return [
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'user_id' => factory(User::class),
        'remember_token' => Str::random(10),
    ];
});
