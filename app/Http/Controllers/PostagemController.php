<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Postagem;

class PostagemController extends Controller
{
    
    // Model de postagem adicionado ao controller para evitar uso estatico
    protected $postagem;

    public function __construct(Postagem $postagem)
    {
       // this->middleware('auth');
        $this->postagem = $postagem;
    }

    public function index() 
    {
        $registros = $this->postagem->all();
        return view('admin.postagem.index', compact('registros'));
    }

    public function adicionar() 
    {
        return view('admin.postagem.adicionar');
    }

    public function salvar(Request $request) 
    {
        $dados = $request->all();

        if($request->hasFile('anexo')) {
            $anexo = $request->file('anexo');
            $num = rand(1111,9999);
            $dir = 'img/postagens/';
            $ex = $anexo->guessClientExtension(); //Define a extensao do arquivo
            $nomeAnexo = 'anexo_'.$num.'.'.$ex;
            $anexo->move($dir, $nomeAnexo);
            $dados['anexo'] = $dir.'/'.$nomeAnexo;
        }
        $this->postagem->create($dados);

        return redirect()->route('admin.postagens');
    }

    public function editar($identifier) 
    {
        $registro = $this->postagem->find($identifier);
        return view('admin.postagem.editar', compact('registro'));        
    }

    public function atualizar(Request $request, $identifier)
    {
        $dados = $request->all();

        if($request->hasFile('anexo')) {
            $anexo = $request->file('anexo');
            $num = rand(1111,9999);
            $dir = 'img/postagens';
            $ex = $anexo->guessClientExtension(); //Define a extensao do arquivo
            $nomeAnexo = 'anexo_'.$num.'.'.$ex;
            $anexo->move($dir, $nomeAnexo);
            $dados['anexo'] = $dir.'/'.$nomeAnexo;
        }

        $this->postagem->find($identifier)->update($dados);

        return redirect()->route('admin.postagens');
    }

    public function deletar($identifier)
    {
        $this->postagem->find($identifier)->delete();
        return redirect()->route('admin.postagens');
    }
    
    
    
}
