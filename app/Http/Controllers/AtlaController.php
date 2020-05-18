<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Atla;
use App\Categoria;
use App\Disciplina;
use App\Http\Requests\AtlaRequest;

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
            $extensao = $anexo->guessClientExtension(); //Define a extensao do arquivo
            $nomeAnexo = 'anexo_'.$num.'.'.$extensao;
            $anexo->move($dir, $nomeAnexo);
            $dados['anexo'] = $dir.'/'.$nomeAnexo;
        }

        if(isset($dados['publicado'])) {
            $dados['publicado'] = true;
        } else {
            $dados['publicado'] = false;    
        }
        $atla=$this->atla->create($dados);
        $atla['slug']=str_slug($atla->titulo).'-'.$atla->id;
        $atla->update($atla->attributesToArray());
        return redirect()->route('auth.atlas')->with('success', 'Página do atlas adicionada com sucesso!');
        
    }

    public function editar(Atla $registro) 
    {
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
        } else {
            $dados['publicado'] = false;    
        }
        $dados['slug']=str_slug($dados['titulo']).'-'.$identifier;
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
        $registros = $this->atla->all();
        $categorias = $this->categoria->all();
        $disciplinas = $this->disciplina->all();
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
        
        $busca = $this->categoria->where('disciplina_id', $disciplina->id);
        $registros = $busca->get();
        $paginas = $busca->paginate(1);
        return view('site.atlas.ver_disciplinas', compact('paginas', 'registros', 'disciplina'));
    }
}
