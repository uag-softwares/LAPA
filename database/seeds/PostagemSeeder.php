<?php

use Illuminate\Database\Seeder;

class PostagemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 10; $i++) {
            factory(App\Postagem::class)->create([
                'tipo_postagem'=>'edital',
                'publicado'=>true,
            ]);
            
            factory(App\Postagem::class)->create([
                'tipo_postagem'=>'evento',
                'publicado'=>true,
            ]);
            factory(App\Postagem::class)->create([
                'tipo_postagem'=>'noticia',
                'publicado'=>true,
            ]);
        }
    }
}