<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CriarDisciplinaRequest extends FormRequest
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
            'nome' => 'required|min:3|unique:disciplinas|max:255',
            'user_id' => 'integer|nullable',
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
            'nome.required' => 'O nome do assunto é obrigatório',
            'nome.min' => 'O tamanho mínimo do nome é 3 letras',
            'nome.unique' => 'Esse assunto já existe',
            'user_id' => 'O professor deve estar cadastrado',
        ];
    }
}
