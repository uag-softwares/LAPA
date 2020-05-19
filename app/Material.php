<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $fillable = [
        'titulo', 'texto', 'anexo', 'disciplina_id','slug',
    ];

    public function disciplina() {
        return $this->belongsTo('App\Disciplina');
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
