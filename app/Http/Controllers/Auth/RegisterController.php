<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Auth;
use Illuminate\Http\Request;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;
   protected $usuario=null;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
     public function __construct(User $usuario) 
    {
       $this->middleware('auth', ['except' => [
            'register','showRegistrationForm']]);
       $this->middleware('guest', ['only' => [
            'register',
            'showRegistrationForm',
        ]]);
       $this->usuario=$usuario;
       
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
	    'cpf' => $data['cpf'],
	    'isAdmin' => $data['isAdmin'],
	    'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
    public function index (){
        
       
	return view('auth.registros.index ');
    }

    public function editar(){
	
	
	return view('auth.registros.editar');
    }
   
    public function atualizar(Request $req)
    {
	$dados = $req->all();
	$this->usuario=Auth::user();
	
	$this->usuario->update($dados);
	
        return redirect()->route('auth.registros')->with('success','Usuário editado com sucesso');           

    }

  public function deletar($id_user){
	$this->usuario= User::find($id_user);

        Auth::logout();

    if ($this->usuario->delete()) {

         return redirect()->route('register')->with('sucesso','Conta exluida com sucesso');
    }
  }
  
}
