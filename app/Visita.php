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
        'data', 'hora_inicial', 'hora_final', 'descricao', 'confirmada', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
}
