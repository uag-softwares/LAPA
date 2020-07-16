<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AtualizarMaterialRequest extends FormRequest
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
           'titulo' =>'required|min:5',
           'texto' => 'required|min:10',
           'disciplina_id' =>'required',
           'anexo' => 'mimes:jpeg,jpg,png,gif,pdf,doc,txt,docx,odt,xls,csv,xlsx,ppt,pptx,rtf|max:2048',
        ];
    }
    public function messages(){
	return[
	    'titulo.required'=>'Título do material é obrigatório',
	    'titulo.min'=>'Título deve conter no mínimo três letras',
	    'texto.required' => 'Escrever sobre o texto é obrigatório',
        'texto.min' => 'O tamanho mínimo é de 10 letras',
	    'disciplina_id.required' => 'Escolher disciplina é obrigátorio',
        ];
    }
}
