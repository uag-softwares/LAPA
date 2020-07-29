<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Atla;
use App\Categoria;
use App\Disciplina;
use App\Http\Requests\CriarAtlaRequest;
use App\Http\Requests\AtualizarAtlaRequest;

class AtlaController extends Controller
{
    
    // Model de atla adicionado ao controller para evitar uso estatico
    protected $atla;
    protected $categoria;
    protected $disciplinas;
    
    

    public function __construct(Atla $atla, Categoria $categoria, Disciplina $disciplina)
    {
        $this->atla = $atla;
        $this->categoria = $categoria; 
        $this->disciplina = $disciplina;

        $this->middleware('auth', ['except' => [
            'atlasPorCategoria',
            'atlasPorDisciplina',
            'siteIndex',
        ]]);
    }

    public function index() 
    {
        $registros = $this->atla;
        $filtros['nomes'] = array();

        if(request()->has('publicado') && request('publicado') != '') {
            $registros = $registros->where('publicado', request('publicado'));
            $filtros['publicado'] = request('publicado');
            $filtros['nomes'] = [request('publicado') ? 'publicados' : 'rascunhos'];
        }
        if(request()->has('categoria') && request('categoria') != '') {
            $registros = $registros->where('categoria_id', request('categoria'));
            $filtros['categoria'] = request('categoria');
            array_push($filtros['nomes'], $this->categoria->find(request('categoria'))->nome);
        }

        $categorias = $this->categoria->all();

        $registros = $registros->latest()->get();
        return view('auth.atlas.index', compact('registros', 'categorias', 'filtros'));
    }

    public function adicionar() 
    {
        $categorias = $this->categoria->all();
        return view('auth.atlas.adicionar', compact('categorias'));

    }

    public function salvar(CriarAtlaRequest $request) 
    {
        $request->validated();
        $dados = $request->all();

        if(isset($dados['publicar'])) {
            $dados['publicado'] = true;
        } else if(isset($dados['rascunho'])) {
            $dados['publicado'] = false;    
        }

        $atla=$this->atla->create($dados);
        
        $atla['slug'] = str_slug($atla->titulo).'-'.$atla->id;

        if($request->hasFile('anexo')) {
            $anexo = $request->file('anexo');
            $dir = 'img/atlas/';
            $extensao = $anexo->guessClientExtension(); //Define a extensao do arquivo
            $nomeAnexo = 'anexo_'.$atla['slug'].'.'.$extensao;
            $anexo->move($dir, $nomeAnexo);
            $atla['anexo'] = $dir.'/'.$nomeAnexo;
        }

        $atla->update($atla->attributesToArray());
        return redirect()->route('auth.atlas')->with('success', 'Página do atlas adicionada com sucesso!');
        
    }

    public function editar(Atla $registro) 
    {
        $categorias = $this->categoria->all();
        return view('auth.atlas.editar', compact('registro', 'categorias'));        

    }

    public function atualizar(AtualizarAtlaRequest $request, $identifier)
    {
        $request->validated();

        $dados = $request->all();

        if(isset($dados['publicar'])) {
            $dados['publicado'] = true;
        } else if(isset($dados['rascunho'])) {
            $dados['publicado'] = false;    
        }

        $dados['slug'] = str_slug($dados['titulo']).'-'.$identifier;

        if($request->hasFile('anexo')) {
            $anexo = $request->file('anexo');
            $dir = 'img/atlas';
            $ex = $anexo->guessClientExtension(); //Define a extensao do arquivo
            $nomeAnexo = 'anexo_'.$dados['slug'].'.'.$ex;
            $anexo->move($dir, $nomeAnexo);
            $dados['anexo'] = $dir.'/'.$nomeAnexo;
        }

        $this->atla->find($identifier)->update($dados);
        return redirect()->route('auth.atlas')->with('success', 'Página do atlas atualizada com sucesso!');
    }

    public function deletar(Atla $registro)
    {
        $registro->delete();
        return redirect()->route('auth.atlas')->with('success', 'Página do atlas deletada com sucesso!');
    }

    public function siteIndex() 
    {
        $registros = $this->atla->where('publicado', true)->latest()->get();

        $categorias = $this->categoria->whereHas('atla', function($query) {
            $query->where('publicado', true);
        })->latest()->get();

        $disciplinas = $this->disciplina->whereHas('categoria', function($queryCategorias) {
            $queryCategorias->whereHas('atla', function($queryDisciplinas) {
                $queryDisciplinas->where('publicado', true);
            });
        })->latest()->get();
        return view('site.atlas.index', compact('registros', 'categorias', 'disciplinas'));
    }

    public function atlasPorCategoria(Categoria $categoria) 
    {
       
        $busca = $this->atla->where('publicado', true)
            ->where('categoria_id', $categoria->id);
        $registros = $busca->get();
        $paginas = $busca->paginate(1);
        return view('site.atlas.ver_atlas', compact('paginas', 'registros', 'categoria'));
    }

    public function atlasPorDisciplina(Disciplina $disciplina) 
    {
        
        $busca = $this->categoria->where('disciplina_id', $disciplina->id)
                                ->whereHas('atla', function($query) {
                                    $query->where('publicado', true);
        });
        $registros = $busca->get();
        $paginas = $busca->paginate(1);
        return view('site.atlas.ver_atlas_disciplinas', compact('paginas', 'registros', 'disciplina'));
    }

    public function ajaxAtlasCategoria($slug) 
    {

    }
}
