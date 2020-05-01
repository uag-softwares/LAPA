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
        $dados = [
            'name' => 'Rodrigo',
            'surname' => 'Andrade',
            'cpf'=>'123.456.789-10',
            'cpf_verified_at' => now(),
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'telephone' => '(87)99999-9999',
            'user_type' => 'admin',
        ];

        $user = null;
        if(User::where('email', '=', $dados['email'])->count()) {
            $user = User::where('email', '=', $dados['email'])->first();
            $user->update($dados);
            echo 'Usuario alterado\n';
        } else {
            User::create($dados);
            echo 'Usuario criado\n';
        }

        $dados = factory(App\Conta::class)->create([
            'password' => bcrypt('12345678'),
            'user_id' => $user->id,
        ]);
    }
}
