<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Disciplina;

class DisciplinaController extends Controller
{

    // Model de disciplina adicionado ao controller para evitar uso estatico
    protected $disciplina;

    public function __construct(Disciplina $disciplina)
    {
        $this->disciplina = $disciplina;
    }

    public function index() 
    {
        $registros = $this->disciplina->all();
        return view('admin.disciplina.index', compact('registros'));
    }

    public function adicionar() 
    {
        return view('admin.disciplina.adicionar');
    }

    public function salvar(Request $request) 
    {
        $dados = $request->all();
        $this->disciplina->create($dados);

        return redirect()->route('admin.disciplinas');
    }

    public function editar($identifier) 
    {
        $registro = $this->disciplina->find($identifier);
        return view('admin.disciplina.editar', compact('registro'));        
    }

    public function atualizar(Request $request, $identifier)
    {
        $dados = $request->all();
        $this->disciplina->find($identifier)->update($dados);

        return redirect()->route('admin.disciplinas');
    }

    public function deletar($identifier)
    {
        $this->disciplina->find($identifier)->delete();
        return redirect()->route('admin.disciplinas');
    }
}
