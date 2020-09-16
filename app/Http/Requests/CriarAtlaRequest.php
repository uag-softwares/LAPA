<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CriarAtlaRequest extends FormRequest
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
            'titulo' => 'required|min:5|string|max:255',
            'descricao' => 'required|min:10|string',
            'categoria_id' => 'required|integer|exists:categorias,id',
            'tipo_anexo' => 'required',
            'anexo_upload' => 'required_if:tipo_anexo,upload|mimes:jpeg,jpg,png,gif|max:2048|nullable',
            'anexo_drive' => 'required_if:tipo_anexo,link_drive|nullable|url',
            'anexo_web' => 'required_if:tipo_anexo,link_web|nullable|url',
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
            'titulo.required' => 'O título do atlas é obrigatório.',
            'titulo.min' => 'O tamanho mínimo do título é de 5 letras.',
            'descricao.required' => 'A descrição do atlas é obrigatório.',
            'descricao.min' => 'O tamanho mínimo da descrição é 10 letras.',
            'categoria_id.required' => 'A área de conhecimento é obrigatória.',
            'categoria_id.exists' => 'A área de conhecimento deve estar cadastrada.',
            'anexo_upload.required_if' => 'É necessário enviar um arquivo quando a opção for selecionada, selecione a opção desejada novamente.',
            'anexo_web.required_if' => 'É necessário enviar um link de imagem da web quando a opção for selecionada, selecione a opção desejada novamente.',
            'anexo_drive.required_if' => 'É necessário enviar um link de imagem do Google Drive quando a opção for selecionada, selecione a opção desejada novamente.',
        ];
    }
}