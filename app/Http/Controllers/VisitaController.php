<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Visita;
use App\Http\Requests\VisitaRequest;

class VisitaController extends Controller
{

    protected $visita;

    public function __construct(Visita $visita) 
    {
        $this->middleware('auth');
        $this->visita = $visita;
    }

    public function index()
    {
        $registros = $this->visita->all()->reverse();
        return view('auth.visitas.index', compact('registros'));
    }

    public function adicionar() 
    {
        return view('auth.visitas.adicionar');        
    }

    public function salvar(VisitaRequest $request) 
    {
        $request->validated();

        $dados = $request->all();
        $this->visita->create($dados);
        return redirect()->route('auth.visitas');
    }

    public function editar($identifier)
    {
        $registro = $this->visita->find($identifier);
        return view('auth.visitas.editar', compact('registro'));
    }

    public function atualizar(VisitaRequest $request, $identifier)
    {
        $request->validated();

        $dados = $request->all();
        $this->visita->find($identifier)->update($dados);
        
        return redirect()->route('auth.visitas');
    }

    public function deletar($identifier) 
    {
        $this->visita->find($identifier)->delete();

        return redirect()->route('auth.visitas');
    }
}
