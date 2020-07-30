<?php

use Illuminate\Database\Seeder;

class MaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $disciplina = factory(App\Disciplina::class)->create();

        for($i = 0; $i < 10; $i++) {
            factory(App\Material::class)->create([
                'publicado' => true,
                'disciplina_id' => $disciplina->id,
            ]);
        }
    }
}
