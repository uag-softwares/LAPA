<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Postagem extends Model
{
    protected $fillable = [
        'titulo', 'descricao', 'data', 'anexo', 'user_id',
    ];
}
