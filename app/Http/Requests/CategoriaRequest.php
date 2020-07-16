<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoriaRequest extends FormRequest
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
            'nome' => 'required|min:3',
            'disciplina_id' => 'required|integer|exists:disciplinas,id',
            
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'nome.required' => 'O nome da área de conhecimento é obrigatório',
            'nome.min' => 'O tamanho mínimo do nome é 3 letras',
            'disciplina_id.required' => 'Você deve escolher uma disciplina',
            'disciplina_id.integer' => 'Erro ao cadastrar a disciplina, tente novamente',
            'disciplina_id.exists' => 'A disciplina não existe, tente novamente',            
        ];
    }
}
