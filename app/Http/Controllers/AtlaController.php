<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Atla;
use App\Categoria;
use App\Disciplina;
use App\Http\Requests\CriarAtlaRequest;
use App\Http\Requests\AtualizarAtlaRequest;
use Auth;
use App\Util\ConvertToEmbedableImageLink;

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
        $this->user = Auth::user();
        $anexo = "Anexo";
        $publicado = false;
      
        if(isset($request['publicar'])) {
            $publicado = true;
        }   
        
        $atla=$this->atla->create([
            'titulo' => $request ['titulo'],
            'descricao' => $request ['descricao'],
            'anexo' => $anexo,
            'publicado'=> $publicado,
            'categoria_id' => $request ['categoria_id'],
        ]);
        $atla['slug'] = str_slug($atla->titulo).'-'.$atla->id;

         /* Se o link for web nao entra no if
        * se for drive ele entra no if para converter o link para ser embarcado na página
        * se for upload ele entra no else if para arrumar o nome do arquivo
        */
        $atla['anexo'] = $request['anexo_web'];
        if($request['tipo_anexo'] == 'link_drive') {
            $atla['anexo'] = ConvertToEmbedableImageLink::convertToEmbedableImageLink($request['anexo_drive']);
        }else if (($request['tipo_anexo'] == 'upload') && $request->hasFile('anexo_upload')) {
            $anexo = $request->file('anexo_upload');
            $dir = 'img/atlas/';
            $ex = $anexo->guessClientExtension(); //Define a extensao do arquivo
            $nomeAnexo = 'anexo_'.$atla->anexo.'-'.$atla->id.'.'.$ex;
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
        $dados['publicado'] = false;
        $atla = $this->atla->find($identifier);
       

        $dados['anexo'] = $request['anexo_web'];
        $dados['tipo_anexo'] = $request['tipo_anexo'];
        if($request['tipo_anexo'] == 'link_drive') {
            $dados['anexo'] = ConvertToEmbedableImageLink::convertToEmbedableImageLink($request['anexo_drive']);
        } else if(($request['tipo_anexo'] == 'upload') && $request->hasFile('anexo_upload')) {
            $anexo = $request->file('anexo_upload');
            $dir = 'img/atlas/';
            $ex = $anexo->guessClientExtension(); //Define a extensao do arquivo
            $nomeAnexo = 'anexo_'.$atla->anexo.'-'.$atla->id.'.'.$ex;
            $anexo->move($dir, $nomeAnexo);
            $dados['anexo']= $dir.'/'.$nomeAnexo;
        }

        if(isset($request['publicar'])) {
            $dados['publicado'] = true;
        } 
        $dados['slug'] = str_slug($dados['titulo']).'-'.$identifier;
        $atla->update($dados);
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

   
}
