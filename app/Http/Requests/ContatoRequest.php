<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContatoRequest extends FormRequest
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
            'email' => 'nullable|email',
            'telefone' => 'nullable|regex:/\(?\d{2}\)?\s?\d{5}\-?\d{4}/', 
            'instagram' => 'nullable|url',
            'twitter' => 'nullable|url',
            'facebook' => 'nullable|url',
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return  [
            'email.email' => 'Digite um endereço de email válido',
            'telefone.regex' => 'O número deve ser no formato (81)99999-9999', 
            'instagram.url' => 'O campo do Instagram deve conter um link, exemplo: https://instagram.com/exemplo',
            'twitter.url' => 'O campo do Twitter deve conter um link, exemplo: https://twitter.com/exemplo',
            'facebook.url' => 'O campo do Facebook deve conter um link, exemplo: https://facebook.com/exemplo',
        ];
    }
}