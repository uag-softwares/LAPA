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

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function categoria() {
        return $this->hasMany('App\Categoria');
    }

    public function material() {
        return $this->hasMany('App\Material');

    }
}
