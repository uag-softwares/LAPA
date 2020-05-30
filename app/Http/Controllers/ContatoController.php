<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contato;
use App\User;
use Validator;


class ContatoController extends Controller
{
    
    protected $contato;

    public function __construct(Contato $contato)
    {
        $this->middleware('auth');
        $this->contato = $contato;
        
    }

    public function index() 
    {
        $registros = $this->contato->latest('updated_at')->first();

        if(!isset($registro)) {
            return view('auth.contato.adicionar');
        }

        return view('auth.contato.editar', compact('registros'));
    }

    public function adicionar() 
    {
        return view('auth.contato.adicionar');

    }

    public function salvar(Request $request) 
    {
       
        $request->validated();

        $dados = $request->all();
        $contato=$this->contato->create($dados);
        $contato['slug']=str_slug( $contato->email).'-'. $contato->id;
        $contato->update($contato->attributesToArray());
        return redirect()->route('auth.contatos')->with('success', 'Informações do Contato adicionadas com sucesso!');
    }

    public function editar(Contato $contato) 
    {
       
        return view('auth.contatos.editar', compact('registro', 'users'));        

    }

    public function atualizar(Request $request, $identifier)
    {
    
        $request->validated();
        $dados = $request->all();
        $dados['slug']=str_slug($dados['emai']).'-'.$identifier;
        $this->contato->find($identifier)->update($dados);
        return redirect()->route('auth.contatos')->with('success', 'Informações do Contato atualizadas com sucesso!');
    }

}
