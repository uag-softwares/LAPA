<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Material;
use App\Disciplina;
use App\Http\Requests\CriarMaterialRequest;
use App\Http\Requests\AtualizarMaterialRequest;
use Auth;

class MaterialController extends Controller
{
   protected $material;
   protected $disciplina;
   
    public function __construct(Material $material, Disciplina $disciplina)
    {

        $this->material = $material;
        $this->disciplina = $disciplina;

        $this->middleware('auth', ['except' => [
            'materiaisPorDisciplina',
            'ver',
            'siteIndex',
            'siteVisualizarMaterial',
        ]]);

    }

    public function index() 
    { 
        $registros = $this->material;
        $filtros['nomes'] = array();

        if(request()->has('publicado') && request('publicado') != '') {
            $registros = $registros->where('publicado', request('publicado'));
            $filtros['publicado'] = request('publicado');
            $filtros['nomes'] = [request('publicado') ? 'publicados' : 'rascunhos'];
        }
        if(request()->has('disciplina') && request('disciplina') != '') {
            $registros = $registros->where('disciplina_id', request('disciplina'));
            $filtros['disciplina'] = request('disciplina');
            array_push($filtros['nomes'], $this->disciplina->find(request('disciplina'))->nome);
        }

        $disciplinas = $this->disciplina->all();
        $registros = $registros->latest()->get();
        return view('auth.materiais.index', compact('registros', 'disciplinas', 'filtros'));

   }

    public function adicionar() 
    {
        $disciplinas = $this->disciplina->all();
        return view('auth.materiais.adicionar', compact('disciplinas'));
    }

    public function salvar(CriarMaterialRequest $request) 
    {
        $request->validated();
        $this->user = Auth::user();
        $anexo = "Anexo";
        $publicado = false;
        
        if(isset($request['publicar'])) {
            $publicado = true;
        } 
     
        $material=$this->material->create([
            'titulo' => $request ['titulo'],
            'texto' => $request ['texto'],
            'anexo' => $anexo,
            'publicado' => $publicado,
            'disciplina_id' => $request ['disciplina_id'],
            'tipo_anexo' => $request ['tipo_anexo'],

        ]);
        $material['slug'] = str_slug($material->titulo).'-'.$material->id;

        $material['anexo'] = $request['anexo_web'];  
             
        if (($request['tipo_anexo'] == 'upload') && $request->hasFile('anexo_upload')) {
            $anexo = $request->file('anexo_upload');
            $dir = 'img/materiais/';
            $extensao = $anexo->guessClientExtension(); //Define a extensao do arquivo
            $nomeAnexo = 'anexo_'.$material['slug'].'.'.$extensao;
            $anexo->move($dir, $nomeAnexo);
            $material['anexo'] = $dir.'/'.$nomeAnexo;
        }

        $material->update($material->attributesToArray());
        return redirect()->route('auth.materiais')->with('success', 'Material adicionado com sucesso!');
    }

    public function editar(Material $registro) 
    {
	    $disciplinas=$this->disciplina->all();
        return view('auth.materiais.editar', compact('registro','disciplinas'));        
    }

    public function atualizar(AtualizarMaterialRequest $request, $identifier)
    {
        $request->validated();
        $dados = $request->all();
        $dados['publicado'] = false;
        $material = $this->material->find($identifier);
         
        if(isset($request['publicar'])) {
            $publicado = true;
        }       

        $dados['anexo'] = $material->anexo;
        $dados['tipo_anexo'] = $request['tipo_anexo'];
        if(($request['tipo_anexo'] == 'upload') && $request->hasFile('anexo_upload')) {
            $anexo = $request->file('anexo_uploadgit');
            $dir = 'img/materiais/';
            $extensao = $anexo->guessClientExtension(); //Define a extensao do arquivo
            $nomeAnexo = 'anexo_'.$dados['slug'].'.'.$extensao;
            $anexo->move($dir, $nomeAnexo);
            $dados['anexo'] = $dir.'/'.$nomeAnexo;
        }

        $dados['slug'] = str_slug($dados['titulo']).'-'.$identifier;
        $material->update($dados);
        return redirect()->route('auth.materiais')->with('success', 'Material atualizado com sucesso!');
    }

    public function deletar(Material $registro)
    {
        $registro->delete();
        return redirect()->route('auth.materiais')->with('success', 'Material deletado com sucesso!');
    }


    public function siteIndex() 
    {
        $registros = $this->material->all();
        $disciplinas = $this->disciplina->all();
        return view('site.materiais.index', compact('registros', 'disciplinas'));
    }
    
    public function materiaisPorDisciplina(Disciplina $disciplina) 
    {
        $busca = $this->material->where('disciplina_id', $disciplina->id);
        $registros = $busca->latest()->get();
        $paginas = $busca->latest()->paginate(1);    
        return view('site.materiais.ver_materiais', compact('registros', 'disciplina', 'paginas'));
    }

    public function siteVisualizarMaterial(Material $registro){
        return view('site.materiais.visualizarMaterial', compact('registro'));
    }


    
}
