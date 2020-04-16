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
            'responsavel' => 'required|min:10',
            'data' => 'required|date|after:today',
            'hora_inicial' => 'required|date_format:H:i|before_or_equal:15:00|after_or_equal:09:00',
            'hora_final' => 'required|date_format:H:i|before_or_equal:15:00|after:hora_inicial',
            'descricao' =>'required|min:10',
            'telefone' => 'required|regex:/\(?\d{2}\)?\s?\d{5}\-?\d{4}/',
            'email' => 'required|email',
            'confirmada' => 'nullable|boolean',
        ];
    }

    public function messages() 
    {
        return [
            'responsavel.required' => 'O nome completo do responsável é obrigatório',
            'responsavel.min' => 'O nome completo do responsável deve ter ao menos 10 letras',
            'data.required' => 'A data da visita é obrigatória',
            'data.date' => 'Data de início da visita inválida',
            'data.after' =>'A data da visita deve ser a partir de amanhã',
            'hora_inicial.required' => 'A hora inicial da visita é obrigatória',
            'hora_inicial.date_format' => 'Hora inicial da visita inválida',
            'hora_inicial.after_or_equal' => 'A hora inicial da visita deve ser antes das 15h',
            'hora_inicial.after_or_equal' => 'A hora inicial da visita deve ser depois das 9h',
            'hora_final.required' => 'A hora final da visita é obrigatória',
            'hora_final.date_format' => 'Hora final da visita inválida',
            'hora_final.before_or_equal' => 'A hora final da visita deve ser antes das 15h',
            'hora_final.after' => 'A hora final da visita deve ser depois da hora inicial',
            'descricao.required' => 'A descrição é obrigatória',
            'descricao.min' => 'A descrição deve ter no mínimo 10 letras',
            'telefone.required' => 'O telefone é obrigatório para o contato',
            'telefone.regex' => 'Número de telefone inválido',
            'email.required' => 'O email é obrigatório',
            'email.email' => 'Email inválido',
            'confirmada.boolean' => 'A confirmação deve ser sim ou não',
        ];
    }
}
