<?php

use App\Conta;
use App\User;
use Illuminate\Database\Seeder;

class ContaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // User Vinicius
        if(!User::where('email', '=', 'v.santos0406@gmail.com')->count()) {
            $vinicius = factory(App\User::class)->create([
                'name' => 'Vinicius',
                'surname' => 'Santos',
                'cpf' => '122.433.655-23',
                'email' => 'v.santos0406@gmail.com',
            ]);

            factory(App\Conta::class)->create([
                'password' => bcrypt('12345678'),
                'user_id' => $vinicius->id,
            ]);
        }

        // User Iris
        if(!User::where('email', '=', 'vianasantana21@gmail.com')->count()) {
            $iris = factory(App\User::class)->create([
                'name' => 'Íris',
                'surname' => 'Viana',
                'cpf' => '342.453.433-12',
                'email' => 'vianasantana21@gmail.com',
            ]);

            factory(App\Conta::class)->create([
                'password' => bcrypt('12345678'),
                'user_id' => $iris->id,
            ]);
        }

         // User Raquel
         if(!User::where('email', '=', 'raquellvieiraa@gmail.com')->count()) {
            $raquel = factory(App\User::class)->create([
                'name' => 'Raquel',
                'surname' => 'Vieira',
                'cpf' => '342.453.433-15',
                'email' => 'raquellvieiraa@gmail.com',
            ]);

            factory(App\Conta::class)->create([
                'password' => bcrypt('12345678'),
                'user_id' => $raquel->id,
            ]);
        }

    }
}
