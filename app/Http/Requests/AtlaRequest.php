<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AtlaRequest extends FormRequest
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
            'titulo' => 'required|min:5|string',
            'descricao' => 'required|min:10|string',
            'categoria_id' => 'required|integer|exists:categorias,id',
            'anexo' => 'mimes:jpeg,jpg,png,gif|max:2048',
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
            'titulo.required' => 'O título do atlas é obrigatório',
            'titulo.min' => 'O tamanho mínimo do título é de 5 letras',
            'descricao.required' => 'A descrição do atlas é obrigatório',
            'descricao.min' => 'O tamanho mínimo da descrição é 10 letras',
            'categoria_id.exists' => 'A categoria deve estar cadastrada',
            'categoria_id.required' => 'A categoria é obrigatória',
        ];
    }
}