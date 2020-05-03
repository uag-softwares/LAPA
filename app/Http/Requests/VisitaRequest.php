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
            'surname' => 'required|string|min:3|max:255',
            'cpf' => 'required|regex:/\d{3}\.\d{3}\.\d{3}\-\d{2}/',
            'email' => 'required|email',
            'telephone' =>  'required|regex:/\(?\d{2}\)?\s?\d{5}\-?\d{4}/',
            'user_type' => 'in:visitant',
            'data' => 'required|date|after:today',
            'hora_inicial' => 'required|date_format:H:i|before_or_equal:15:00|after_or_equal:09:00',
            'hora_final' => 'required|date_format:H:i|before_or_equal:15:00|after:hora_inicial',
            'descricao' =>'required|min:10',
            'confirmada' => 'nullable|boolean',
        ];
    }

    public function messages() 
    {
        return [
            'name.required' => 'O nome do responsável é obrigatório',
            'name.min' => 'O nome responsável deve ter ao menos 3 letras',
            'name.max' => 'O nome responsável deve ter no máximo 255 letras',
            'name.string' => 'O nome responsável deve ter letras',
            'surname.required' => 'O sobrenome do responsável é obrigatório',
            'surname.min' => 'O sobrenome responsável deve ter ao menos 3 letras',
            'surname.max' => 'O sobrenome responsável deve ter no máximo 255 letras',
            'surname.string' => 'O sobrenome responsável deve ter letras',
            'cpf.required' => 'O CPF é deve ser preenchido',
            'cpf.regex' => 'O CPF deve ser no formato 123.456.789-10',
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
            'user_type.in' => 'Você não alterar esse campo',
        ];
    }
}
