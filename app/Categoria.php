<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class categoria extends Model
{
     /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'nome', 'disciplina_id',
    ];

    public function disciplina() {
        return $this->belongsTo('App\Disciplina');
    }

}
