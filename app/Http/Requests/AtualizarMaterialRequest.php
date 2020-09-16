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
           'titulo' =>'required|min:5|max:255',
           'texto' => 'required|min:10',
           'disciplina_id' =>'required',
           'tipo_anexo',
           'anexo_web' => 'required_if:tipo_anexo,link_web|url|nullable',
        ];
    }
    public function messages(){
        return [
            'titulo.required'=>'Título do material é obrigatório',
            'titulo.min'=>'Título deve conter no mínimo três letras',
            'texto.required' => 'Escrever sobre o texto é obrigatório',
            'texto.min' => 'O tamanho mínimo é de 10 letras',
            'disciplina_id.required' => 'Escolher assunto é obrigátorio',
            'anexo_web.required_if' => 'É necessário enviar um link de imagem da web quando a opção for selecionada, selecione a opção desejada novamente.',
        ];
    }
}
