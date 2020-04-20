<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Visita;

class VisitaTest extends TestCase
{
    use RefreshDatabase;

    /** @test Agendar uma visita*/
    public function agendarUmaVisita()
    {
        $visita = factory(Visita::class)->create([
            'responsavel' => 'Vinicius Santos',
        ]);

        $this->assertDatabaseHas('visitas', [
            'responsavel' => 'Vinicius Santos',
        ]);
    }

    /** @test Ver uma visita*/
    public function verUmaVisita()
    {
        $visita = factory(Visita::class)->create([
            'responsavel' => 'Vinicius Santos',
            'descricao' => 'Este é o texto da visita',
        ]);

        $this->assertDatabaseHas('visitas', [
            'descricao' => 'Este é o texto da visita',
        ]);
    }

    /** @test Confirmar uma visita*/
    public function confirmarUmaVisita()
    {
        $visita = factory(Visita::class)->create([
            'responsavel' => 'Vinicius Santos',
        ]);

        $this->assertDatabaseHas('visitas', [
            'responsavel' => 'Vinicius Santos',
        ]);

        $visita->update([
            'confirmada' => true,
        ]);

        $this->assertEquals(true, $visita->confirmada);
       
    }

    /** @test Cancelar uma visita*/
    public function deletarUmaVisita() 
    {
        $visita = factory(Visita::class)->create([
            'responsavel' => 'Vinicius Santos',
        ]);
        $visita->delete();
        $this->assertDeleted($visita);
    }
}
