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
            'descricao' => 'required|min:10',
            'tipo_postagem'=>'required',
            'data' => 'required_if:tipo_postagem,evento|nullable|date|after:today',
            'hora' => 'required_if:tipo_postagem,evento|nullable|date_format:H:i|after_or_equal:00:00',
            'tipo_anexo' => 'required',
            'anexo_upload' => 'required_if:tipo_anexo,upload|mimes:jpeg,jpg,png,gif|max:2048|nullable',
            'anexo_drive' => 'required_if:tipo_anexo,link_drive|nullable',
            'anexo_web' => 'required_if:tipo_anexo,link_web|nullable',
        ];
    }
   public function messages(){
	    return [
            'tipo_postagem.required'=>'Selecionar o tipo da postagem é obrigatório', 
	        'hora.date_format'=>" A hora selecionada não está no formato H:i",
            'data.after'=>'A data selecionada tem que ser posterior a hoje',
            'anexo_upload.required_if' => 'É necessário enviar um arquivo quando a opção for selecionada, selecione a opção desejada novamente.',
            'anexo_web.required_if' => 'É necessário enviar um link de imagem do Google Drive quando a opção for selecionada, selecione a opção desejada novamente.',
            'anexo_drive.required_if' => 'É necessário enviar um link de imagem da web quando a opção for selecionada, selecione a opção desejada novamente.',

        ];
    }
    
}
