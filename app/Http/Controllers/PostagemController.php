<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Postagem;
use App\User;
use Validator;
use App\Http\Requests\PostagemRequest;
use Auth;
class PostagemController extends Controller
{
    
    // Model de postagem adicionado ao controller para evitar uso estatico
    protected $postagem;
    protected $user;


    public function __construct(Postagem $postagem, User $user)
    {
        $this->middleware('auth', ['except' => ['siteIndexNoticia','siteVizualizarEvento',
                                  'siteVizualizarNoticia','siteVizualizarEdital',
                                  'siteHome','siteIndexEvento','siteIndexEdital']]);
        $this->postagem = $postagem;
        $this->user = $user;
    }

    public function index() 
    {
        $registros = $this->postagem->all();
        return view('auth.postagem.index', compact('registros'));
    }

    public function adicionar() 
    {
        $tipo_postagens= $this->postagem->getEnumValues();
        return view('auth.postagem.adicionar', compact('tipo_postagens'));
    }

    public function salvar(PostagemRequest $request) 
    {
        $request->validated();
        $this->user=Auth::user();
        $anexo=null;
        if($request->hasFile('anexo')) {
            $anexo = $request->file('anexo');
            $num = rand(1111,9999);
            $dir = 'img/postagens/';
            $ex = $anexo->guessClientExtension(); //Define a extensao do arquivo
            $nomeAnexo = 'anexo_'.$num.'.'.$ex;
            $anexo->move($dir, $nomeAnexo);
            $anexo = $dir.'/'.$nomeAnexo;
        }
        if(isset($request['publicado'])) {
            $request['publicado'] = true;
        } else {
            $request['publicado'] = false;    
        }
         if($request['tipo_postagem']=='evento'){
             if($request['data']==null){
                return redirect()->back()->withErrors(['data' => 'Selecionar data quando a postagem for um evento é obrigatório']);
             }
        }
        $this->postagem->create([
            'titulo' => $request ['titulo'],
	    'descricao' => $request ['descricao'],
	    'anexo' =>  $anexo,
	    'tipo_postagem' => $request['tipo_postagem'],
	    'user_id' =>$this->user->id,
            'publicado'=>$request['publicado'],
            'data'=>$request['data'],
	    
        ]);
        
        return redirect()->route('auth.postagens')->with('success', 'Postagem adicionada com sucesso!');
    }
   
    public function editar($identifier) 
    {
        $registro = $this->postagem->find($identifier);
        $tipo_postagens= $this->postagem->getEnumValues();
        return view('auth.postagem.editar', compact('registro','tipo_postagens'));        
    }

    public function atualizar(PostagemRequest $request, $identifier)
    {
        $request->validated();
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
        if(isset($dados['publicado'])) {
            $dados['publicado'] = true;
        } else {
            $dados['publicado'] = false;    
        }
         if($request['tipo_postagem']=='evento'){
             if($request['data']==null){
                return redirect()->back()->withErrors(['data' => 'Selecionar data quando a postagem for um evento é obrigatório']);
             }
        }
        $this->postagem->find($identifier)->update($dados);
        return redirect()->route('auth.postagens')->with('success', 'Postagem atualizada com sucesso!');
    }

    public function deletar($identifier)
    {
        $this->postagem->find($identifier)->delete();
        return redirect()->route('auth.postagens')->with('success', 'Postagem deletada com sucesso!');
    }
    
     public function siteHome(){//ordenar por data
        $posts= $this->postagem->where( 'tipo_postagem', 'noticia')->getQuery()->orderBy('updated_at', 'DESC')->get();
        if (count($posts)> 3){
           $registros=[$posts[0],$posts[1],$posts[2]];
        }
        else{
           $registros=$posts;
        }
        return view('site.postagens.home', compact('registros'));
    }
    public function siteIndexEvento(){
        $posts = $this->postagem->where( 'tipo_postagem', 'evento')->getQuery()->orderBy('updated_at', 'DESC')->get();
        $registros = $posts->where('publicado',true)->all();
        return view('site.postagens.indexEvento', compact('registros'));
    }
   public function siteIndexEdital(){
       $posts = $this->postagem->where( 'tipo_postagem', 'edital')->getQuery()->orderBy('updated_at', 'DESC')->get();
       $registros = $posts->where('publicado',true)->all();
       return view('site.postagens.indexEdital', compact('registros'));
   }
   public function siteIndexNoticia(){
        $posts = $this->postagem->where( 'tipo_postagem', 'noticia')->getQuery()->orderBy('updated_at', 'DESC')->get();
        $registros = $posts->where('publicado',true)->all();
        return view('site.postagens.indexNoticia', compact('registros'));
    }
   public function siteVizualizarEvento($identifier){
        $registro = $this->postagem->find($identifier);
        
        return view('site.postagens.vizualizarEvento', compact('registro'));
    }
  public function siteVizualizarNoticia($identifier){
        $registro = $this->postagem->find($identifier);
       
        return view('site.postagens.vizualizarNoticia', compact('registro'));
    }
  public function siteVizualizarEdital($identifier){
        $registro = $this->postagem->find($identifier);
       
        return view('site.postagens.vizualizarEdital', compact('registro'));
    }
    
}
