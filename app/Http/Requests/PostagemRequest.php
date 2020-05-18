<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostagemRequest extends FormRequest
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
            'titulo' => 'required|min:5|max:255',
            'descricao' => 'required|min:10|max:255',
            'data' => 'nullable|date|after:today',
            'hora' => 'nullable|date_format:H:i|after_or_equal:00:00',
            'anexo' => 'mimes:jpeg,jpg,png,gif|max:2048|nullable',
            'tipo_postagem'=>'required'
            
        ];
    }
   public function messages(){
	return[
	    'tipo_postagem.required'=>'Selecionar o tipo da postagem é obrigatório',    
        ];
    }
    
}
