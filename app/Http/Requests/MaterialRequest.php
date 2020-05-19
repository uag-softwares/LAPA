<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MaterialRequest extends FormRequest
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
           'titulo' =>['required','min:5'],
           'texto' => ['required','min:10'],
           'disciplina_id' =>['required'],
           'anexo' => ['max:2048']
        ];
    }
    public function messages(){
	return[
	    'titulo.required'=>'Título do material é obrigatório',
	    'titulo.min'=>'Título deve conter no mínimo três letras',
	    'texto.required' => 'Escrever sobre o texto é obrigatório',
        'texto.min' => 'O tamanho mínimo é de 10 letras',
        'anexo.max' => 'O tamanho máximo do anexo deve ser 2MB',
	    'disciplina_id.required' => 'Escolher disciplina é obrigátorio',
	   
	    
        ];
    }
}
