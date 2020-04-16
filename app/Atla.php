<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Atla extends Model
{
   /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'titulo', 'descricao', 'anexo', 'publicado', 'categoria_id',
    ];

    public function user() {
        return $this->belongsTo('App\Categoria');
    } 
}
