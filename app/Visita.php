<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visita extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'responsavel', 'data', 'hora_inicial', 'hora_final', 'descricao', 'telefone', 'email', 'confirmada', 
    ];
    
}
