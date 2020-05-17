<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Postagem extends Model
{  
     /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'titulo', 'descricao', 'anexo', 'user_id','tipo_postagem','publicado','data','slug',

    ];

    public function user() {
        return $this->belongsTo('App\User');
    }
    public function getEnumValues(){
       $listaEnum=['noticia','edital','evento'];
       return $listaEnum;
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
