<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VisitaRequest extends FormRequest
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
            'name' => 'required|string|min:3|max:255',
            'cpf' => 'required|regex:/\d{3}\.\d{3}\.\d{3}\-\d{2}/',
            'email' => 'required|email',
            'telephone' =>  'required|regex:/\(?\d{2}\)?\s?\d{5}\-?\d{4}/',
            'user_type' => 'in:visitant',
            'data' => 'required|date_format:d/m/Y|after:today',
            'hora_inicial' => 'required',
            'hora_final' => 'required',
            'descricao' =>'required|min:10',
            'confirmada' => 'nullable',
	    'g-recaptcha-response' => 'required',
        ];
    }

    public function messages() 
    {
        return [
            'name.required' => 'O nome do responsável é obrigatório',
            'name.min' => 'O nome responsável deve ter ao menos 3 letras',
            'name.max' => 'O nome responsável deve ter no máximo 255 letras',
            'name.string' => 'O nome responsável deve ter letras',
            'cpf.required' => 'O CPF é deve ser preenchido',
            'cpf.regex' => 'O CPF deve ser no formato 123.456.789-10',
            'data.required' => 'A data da visita é obrigatória',
            'data.date_format' => 'Data da visita inválida',
            'data.after' =>'A data da visita deve ser a partir de amanhã',
            'hora_inicial.required' => 'A hora inicial da visita é obrigatória',
            'hora_final.required' => 'A hora final da visita é obrigatória',
            'descricao.required' => 'A descrição é obrigatória',
            'descricao.min' => 'A descrição deve ter no mínimo 10 letras',
            'telephone.required' => 'O telefone é obrigatório para o contato',
            'telephone.regex' => 'Número de telefone inválido',
            'email.required' => 'O email é obrigatório',
            'email.email' => 'Email inválido',
            'confirmada.nullable' => 'A confirmação pode ser nula',
            'user_type.in' => 'Você não alterar esse campo',
	        'g-recaptcha-response.required'=>'O campo reCaptcha é obrigatório, preencha novamente a data e horários da visita e confirme o reCapatcha.',
        ];
    }
}
