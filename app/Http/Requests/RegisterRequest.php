<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string','min:3', 'max:255'],
	    'surname' => ['required', 'string','min:3', 'max:255'],
            'link_lattes' => ['regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/','string', 'unique:users'],
            'avatar' => 'mimes:jpeg,jpg,png,gif|max:2048'
	    
        ];
    }
    public function messages(){
	return[
	    'name.required'=>'Nome deve ser obrigatório',
	    'name.string'=>'Nome não pode conter números',
	    'name.min'=>'Nome deve conter no mínimo três caracteres',
            'surname.required'=>'Sobrenome deve ser obrigatório',
	    'surname.string'=>'Sobrenome não pode conter números',
	    'surname.min'=>'Sobrenome deve conter no mínimo três caracteres',
            'link_lattes.unique'=>'Link do currículo lattes já existe',
	    'link_lattes.regex'=>'Link inválido',
            'avatar.mimes'=> 'A imagem deve ser do tipo jpeg,png,gif ou jpg',
            'avatar.max'=> 'A imagem não pode conter um arquivo com mais de 2048 KB',
	   
	    
        ];
    }
}
