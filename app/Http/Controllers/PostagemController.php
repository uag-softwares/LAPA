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

        setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
    }

    public function index() 
    {

        $registros = $this->postagem;
        $filtros['nomes'] = array();

        if(request()->has('publicado') && request('publicado') != '') {
            $registros = $registros->where('publicado', request('publicado'));
            $filtros['publicado'] = request('publicado');
            $filtros['nomes'] = [request('publicado') ? 'publicados' : 'rascunhos'];
        }

        if(request()->has('tipo_postagem') && request('tipo_postagem') != '') {
            $registros = $registros->where('tipo_postagem', request('tipo_postagem'));
            $filtros['tipo_postagem'] = request('tipo_postagem');
            //$filtros['nomes'] = [request('tipo_postagem') ? 'edital' : 'evento'];
            $filtros['nomes'] = request('tipo_postagem');
            // array_push($filtros['nomes'],$this->postagem->find(request('tipo_postagem')));
        }
        
        
        $tipo_postagens= $this->postagem->getEnumValues();
        $registros = $registros->latest()->get();
        return view('auth.postagem.index', compact('registros','filtros','tipo_postagens'));
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
        $publicado=false; 
        
        if(isset($request['publicar'])) {
            $publicado = true;
        }
         if($request['tipo_postagem']=='evento'){
             if($request['data']==null){
                return redirect()->back()->withErrors(['data' => 'Selecionar data quando a postagem for um evento é obrigatório'])->withInput();
             }
            else if($request['hora']==null){
                return redirect()->back()->withErrors(['hora' => 'Selecionar a hora quando a postagem for um evento é obrigatório'])->withInput();
             }
        }
        $post=$this->postagem->create([
            'titulo' => $request ['titulo'],
            'descricao' => $request ['descricao'],
            'anexo' =>  $anexo,
            'tipo_postagem' => $request['tipo_postagem'],
            'user_id' =>$this->user->id,
            'publicado'=>$publicado,
            'data'=>$request['data'],
            'hora'=>$request['hora'],
	    
        ]);
        $post['slug']=str_slug($post->titulo).'-'.$post->id;
	if($request->hasFile('anexo')) {
            $anexo = $request->file('anexo');
            $dir = 'img/postagens/';
            $ex = $anexo->guessClientExtension(); //Define a extensao do arquivo
            $nomeAnexo = 'anexo_'.$post->tipo_postagem.'-'.$post->id.'.'.$ex;
            $anexo->move($dir, $nomeAnexo);
            $post['anexo']= $dir.'/'.$nomeAnexo;
        }
        $post->update($post->attributesToArray());
        return redirect()->route('auth.postagens')->with('success', 'Postagem adicionada com sucesso!');
    }
   
    public function editar(Postagem $registro) 
    {
        $tipo_postagens= $this->postagem->getEnumValues();
        return view('auth.postagem.editar', compact('registro','tipo_postagens'));        
    }

    public function atualizar(PostagemRequest $request, $identifier)
    {
        $request->validated();
        $dados = $request->all();
        $dados['publicado'] = false; 
	$post=$this->postagem->find($identifier);
        if($request->hasFile('anexo')) {
            $anexo = $request->file('anexo');
            $dir = 'img/postagens/';
            $ex = $anexo->guessClientExtension(); //Define a extensao do arquivo
            $nomeAnexo = 'anexo_'.$post->tipo_postagem.'-'.$post->id.'.'.$ex;
            $anexo->move($dir, $nomeAnexo);
            $dados['anexo']= $dir.'/'.$nomeAnexo;
        }
        if(isset($request['publicar'])) {
            $dados['publicado'] = true;
        } 
         if($request['tipo_postagem']=='evento'){
             if($request['data']==null){
                return redirect()->back()->withErrors(['data' => 'Selecionar data quando a postagem for um evento é obrigatório']);
             }
             else if($request['hora']==null){
                return redirect()->back()->withErrors(['hora' => 'Selecionar a hora quando a postagem for um evento é obrigatório']);
             }
        }
        $dados['slug']=str_slug($dados['titulo']).'-'.$identifier;
        $post->update($dados);
        return redirect()->route('auth.postagens')->with('success', 'Postagem atualizada com sucesso!');
    }

    public function deletar(Postagem $registro)
    {
        $registro->delete();
        return redirect()->route('auth.postagens')->with('success', 'Postagem deletada com sucesso!');
    }
    
     public function siteHome(){//ordenar por data

        $registros = $this->postagem->where('publicado', true)
                                ->where( 'tipo_postagem', 'noticia')
                                ->latest()->take(3)->get();
        $eventos = $this->postagem->where('publicado', true)
                                ->where( 'tipo_postagem', 'evento')
                                ->latest()->take(3)->get();
        $editais = $this->postagem->where('publicado', true)
                                ->where( 'tipo_postagem', 'edital')
                                ->latest()->take(3)->get();

        return view('site.postagens.home', compact('registros', 'eventos', 'editais'));
    }

    public function siteIndexEvento()
    {
        $posts = $this->postagem->where('tipo_postagem', 'evento');
        
        $agenda = [];
        foreach($posts->get() as $post) {
            $item = [
                'location' => $post->slug,
                'date' => $post->data,
                'hora_inicial' => date('H:i', strtotime($post->hora)),
                'hora_final' => null,
                'title' => $post->titulo,
            ];
            array_push($agenda, $item);
        }
        
        $registros = $posts->latest()->where('publicado',true)->paginate(6);
        return view('site.postagens.indexEvento', compact('registros', 'agenda'));
    }

    public function siteIndexEdital(){
       $posts = $this->postagem->where( 'tipo_postagem', 'edital')->latest();
       $registros = $posts->where('publicado',true)->paginate(6);
       return view('site.postagens.indexEdital', compact('registros'));
    }

    public function siteIndexNoticia(){
        $posts = $this->postagem->where( 'tipo_postagem', 'noticia')->latest();
        $registros = $posts->where('publicado',true)->paginate(6);
        return view('site.postagens.indexNoticia', compact('registros'));
    }

    public function siteVizualizarEvento(Postagem $registro){
        return view('site.postagens.vizualizarEvento', compact('registro'));
    }

    public function siteVizualizarNoticia(Postagem $registro){
       return view('site.postagens.vizualizarNoticia', compact('registro'));
    }
    
    public function siteVizualizarEdital(Postagem $registro){
        return view('site.postagens.vizualizarEdital', compact('registro'));
    }

}
