<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $fillable = [
        'titulo', 'texto', 'anexo', 'disciplina_id',
    ];

    public function disciplina() {
        return $this->belongsTo('App\Disciplina');
    }
}
