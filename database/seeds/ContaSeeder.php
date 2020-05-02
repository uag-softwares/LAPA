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
        if(!User::where('email', '=', 'vinicius@admin.com')->count()) {
            $vinicius = factory(App\User::class)->create([
                'name' => 'Vinicius',
                'email' => 'vinicius@admin.com',
            ]);

            factory(App\Conta::class)->create([
                'password' => bcrypt('12345678'),
                'user_id' => $vinicius->id,
            ]);
        }

        // User Daniela
        if(!User::where('email', '=', 'daniela@admin.com')->count()) {
            $daniela = factory(App\User::class)->create([
                'name' => 'Daniela',
                'email' => 'daniela@admin.com',
            ]);

            factory(App\Conta::class)->create([
                'password' => bcrypt('12345678'),
                'user_id' => $daniela->id,
            ]);
        }
    }
}
