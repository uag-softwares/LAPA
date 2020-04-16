<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Atla;
use App\Categoria;
use App\Http\Requests\AtlaRequest;

class AtlaController extends Controller
{
    
    // Model de atla adicionado ao controller para evitar uso estatico
    protected $atla;
    protected $categoria;
    
    

    public function __construct(Atla $atla, Categoria $categoria)
    {
        $this->middleware('auth');
        $this->atla = $atla;
        $this->categoria = $categoria;
        
        
    }

    public function index() 
    {
        $registros = $this->atla->all();
        return view('auth.atlas.index', compact('registros'));
    }

    public function adicionar() 
    {
        $categorias = $this->categoria->all();
        return view('auth.atlas.adicionar', compact('categorias'));

    }

    public function salvar(AtlaRequest $request) 
    {
        $request->validated();
        $dados = $request->all();

        if($request->hasFile('anexo')) {
            $anexo = $request->file('anexo');
            $num = rand(1111,9999);
            $dir = 'img/atlas/';
            $ex = $anexo->guessClientExtension(); //Define a extensao do arquivo
            $nomeAnexo = 'anexo_'.$num.'.'.$ex;
            $anexo->move($dir, $nomeAnexo);
            $dados['anexo'] = $dir.'/'.$nomeAnexo;
        }

        if(isset($dados['publicado'])) {
            $dados['publicado'] = true;
        }
            $dados['publicado'] = false;    
            
        $this->atla->create($dados);

        return redirect()->route('auth.atlas');
    }

    public function editar($identifier) 
    {
        $registro = $this->atla->find($identifier);
        $categorias = $this->categoria->all();
        return view('auth.atlas.editar', compact('registro', 'categorias'));        

    }

    public function atualizar(AtlaRequest $request, $identifier)
    {
        $request->validated();

        $dados = $request->all();

        if($request->hasFile('anexo')) {
            $anexo = $request->file('anexo');
            $num = rand(1111,9999);
            $dir = 'img/atlas';
            $ex = $anexo->guessClientExtension(); //Define a extensao do arquivo
            $nomeAnexo = 'anexo_'.$num.'.'.$ex;
            $anexo->move($dir, $nomeAnexo);
            $dados['anexo'] = $dir.'/'.$nomeAnexo;
        }

        if(isset($dados['publicado'])) {
            $dados['publicado'] = true;
        } 
            $dados['publicado'] = false;
        
        $this->atla->find($identifier)->update($dados);

        return redirect()->route('auth.atlas');
    }

    public function deletar($identifier)
    {
        $this->atla->find($identifier)->delete();
        return redirect()->route('auth.atlas');
    }
}
