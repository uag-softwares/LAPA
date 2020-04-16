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
use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\RegisterRequest;
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
    protected $usuario;
  
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

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string','min:3', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6','confirmed'],
	    'cpf' => ['required', 'regex:/\d{3}\.\d{3}\.\d{3}\-\d{2}/','string', 'unique:users'],
            
        ],[
	    'name.required'=>'Nome deve ser obrigatório',
	    'name.string'=>'Nome não pode conter números',
	    'name.min'=>'Nome deve conter no mínimo três caracteres',
	    'cpf.required'=>'CPF deve ser obrigatório',
	    'cpf.regex'=>'CPF formato inválido',
	    'cpf.unique'=>'CPF já existe',
	    'email.required'=>'Email deve ser obrigatório',
	    'email.email'=>'Email inválido',
	    'email.unique'=>'Email já existe',
	    'password.required'=>'Senha deve ser obrigatória',
	    'password.min'=>'Senha deve conter no mínimo seis caracteres',
	    'password.confirmed'=>'Senhas não conferem',
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
	
        return $this->usuario->create([
            'name' => $data['name'],
	    'cpf' => $data['cpf'],
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
   
    public function atualizar(RegisterRequest $data)
    {  
        $data->validated();
	$dados = $data->all();
        $user=Auth::user();
        if(Hash::check($dados['password'], $user->password)){
		$dados['password']= $user->password;
        	$user->update($dados);
		return redirect()->route('auth.registros')->with('success','Usuário editado com sucesso'); 
        }  
        
	return redirect()->back()->withErrors(['password' => 'Senha incorreta']);
          

    }

  public function deletar($id_user){
	$data=$this->usuario->find($id_user);

        Auth::logout();

    if ($data->delete()) {

         return redirect()->route('register')->with('sucesso','Conta exluida com sucesso');
    }
  }
  
}
