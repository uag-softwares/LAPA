<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    protected $postagem;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()//lembrar de criar middleware para ativar cpf
    {
        $this->middleware('auth', ['except' => ['home','login']]);
        $this->postagem = $postagem;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('login');
    }

    public function gerenciar() 
    {
        return view('auth.home');
    }
}
