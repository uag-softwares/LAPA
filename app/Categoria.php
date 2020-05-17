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
        'nome', 'disciplina_id','slug',
    ];

    public function disciplina() {
        return $this->belongsTo('App\Disciplina');
    }

    public function atla() {
        return $this->hasMany('App\Atla');
    }
      /**
  * Get the route key for the model.
  *
  * @return string
  */
  public function getRouteKeyName()
  {
    return 'slug';
  }

}
