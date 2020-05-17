<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Categoria;
use App\Disciplina;
use App\Http\Requests\CategoriaRequest;

class CategoriaController extends Controller
{
    
    // Model de categoria adicionado ao controller para evitar uso estatico
    protected $categoria;
    protected $disciplina;
    

    public function __construct(Categoria $categoria, Disciplina $disciplina)
    {
        $this->middleware('auth');
        $this->categoria = $categoria;
        $this->disciplina = $disciplina;
        
    }

    public function index() 
    {
        $registros = $this->categoria->all();
        return view('auth.categorias.index', compact('registros'));
    }

    public function adicionar() 
    {
        $disciplinas = $this->disciplina->all();
        return view('auth.categorias.adicionar', compact('disciplinas'));

    }

    public function salvar(CategoriaRequest $request) 
    {
        $request->validated();

        $dados = $request->all();

        $categotia= $this->categoria->create($dados);
        $categotia['slug']=str_slug($categotia->nome).'-'.$categotia->id;
        $categotia->update($categotia->attributesToArray());
        return redirect()->route('auth.categorias')->with('success', 'Categoria adicionada com sucesso!');
    }

    public function editar(Categoria $registro) 
    {
        $disciplinas = $this->disciplina->all();
        return view('auth.categorias.editar', compact('registro', 'disciplinas'));        

    }

    public function atualizar(CategoriaRequest $request, $identifier)
    {
        $request->validated();

        $dados = $request->all();
        $dados['slug']=str_slug($dados['nome']).'-'.$identifier;
        $this->categoria->find($identifier)->update($dados);

        return redirect()->route('auth.categorias')->with('success', 'Categoria atualizada com sucesso!');;
    }

    public function deletar(Categoria $registro)
    {
        $registro->delete();
        return redirect()->route('auth.categorias')->with('success', 'Categoria deletada com sucesso!');;
    }
}
