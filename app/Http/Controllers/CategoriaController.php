<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Categoria;
use App\Http\Requests\CategoriaRequest;

class CategoriaController extends Controller
{
    
    // Model de categoria adicionado ao controller para evitar uso estatico
    protected $categoria;
    

    public function __construct(Categoria $categoria)
    {
        $this->middleware('auth');
        $this->categoria = $categoria;
        
    }

    public function index() 
    {
        $registros = $this->categoria->all();
        return view('auth.categorias.index', compact('registros'));
    }

    public function adicionar() 
    {
        return view('auth.categorias.adicionar');

    }

    public function salvar(CategoriaRequest $request) 
    {
        $request->validated();

        $dados = $request->all();

        $this->categoria->create($dados);

        return redirect()->route('auth.categorias');
    }

    public function editar($identifier) 
    {
        $registro = $this->categoria->find($identifier);
        return view('auth.categorias.editar', compact('registro'));        

    }

    public function atualizar(CategoriaRequest $request, $identifier)
    {
        $request->validated();

        $dados = $request->all();
        $this->categoria->find($identifier)->update($dados);

        return redirect()->route('auth.categorias');
    }

    public function deletar($identifier)
    {
        $this->categoria->find($identifier)->delete();
        return redirect()->route('auth.categorias');
    }
}
