<?php

use Illuminate\Database\Seeder;
use App\Atla;

class AtlaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categoria = factory(App\Categoria::class)->create();

        for($i = 0; $i < 10; $i++) {
            factory(App\Atla::class)->create([
                'publicado' => true,
                'categoria_id' => $categoria->id,
            ]);
        }
    }
}
