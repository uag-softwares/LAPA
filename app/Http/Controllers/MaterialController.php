<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Material;
use App\Disciplina;
use Validator;
use App\Http\Requests\CriarMaterialRequest;
use App\Http\Requests\AtualizarMaterialRequest;
class MaterialController extends Controller
{
   protected $material;
   protected $disciplina;
   
    public function __construct(Material $material, Disciplina $disciplina)
    {
        $this->middleware('auth', ['except' => [
            'materiaisPorDisciplina',
            'ver',
            'siteIndex',
        ]]);

        $this->material = $material;
        $this->disciplina = $disciplina;
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
        $disciplinas=$this->disciplina->all();
        return view('auth.materiais.adicionar', compact('disciplinas'));
    }

    public function salvar(CriarMaterialRequest $request) 
    {
        $request->validated();
        $dados = $request->all();

        if(isset($dados['publicar'])) {
            $dados['publicado'] = true;
        } else if(isset($dados['rascunho'])) {
            $dados['publicado'] = false;    
        }
     
        $material=$this->material->create($dados);
        $material['slug'] = str_slug($material->titulo).'-'.$material->id;

        if($request->hasFile('anexo')) {
            $anexo = $request->file('anexo');
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

    public function atualizar(AtualizarMaterialRequest $request, $material_id)
    {
        $request->validated();
        $dados = $request->all();

        if(isset($dados['publicar'])) {
            $dados['publicado'] = true;
        } else if(isset($dados['rascunho'])) {
            $dados['publicado'] = false;    
        }

        $dados['slug']=str_slug($dados['titulo']).'-'.$material_id;

        if($request->hasFile('anexo')) {
            $anexo = $request->file('anexo');
            $dir = 'img/materiais/';
            $extensao = $anexo->guessClientExtension(); //Define a extensao do arquivo
            $nomeAnexo = 'anexo_'.$dados['slug'].'.'.$extensao;
            $anexo->move($dir, $nomeAnexo);
            $dados['anexo'] = $dir.'/'.$nomeAnexo;
        }
            
        $this->material->find($material_id)->update($dados);
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

    
}
