<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Disciplina extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome', 'user_id',
    ];

    /**
     * Regras das validacoes dos campos
     */
    public static $rules = [
        'nome' => 'required|min:3',
        'user_id' => 'integer|nullable',
    ];

    public static $messages = [
        'nome.required' => 'O nome da disciplina é obrigatório',
        'nome.min' => 'O tamanho mínimo do nome é 3 letras',
        'user_id' => 'O professor deve estar cadastrado',
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }
}
