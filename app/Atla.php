<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Str;

class Atla extends Model
{
   /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'titulo', 'descricao', 'anexo', 'publicado', 'categoria_id','slug', 'tipo_anexo',
    ];

    public function categoria() {
        return $this->belongsTo('App\Categoria');
    } 

    public function quantidadeAtlasPublicados() {
        return $this->where('publicado', true)->where('categoria_id', $this->categoria_id)->count();
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

   /**
    * Convert a shared image link from drive to an embedable image link.
    *
    * @return string
    */
    public static function convertToEmbedableImageLink($link) {
      $embedableLink = Str::replaceFirst('https://drive.google.com/file/d/', 'https://drive.google.com/thumbnail?id=', $link);
      $embedableLink = Str::replaceFirst('/view?usp=sharing', '', $embedableLink);

      return $embedableLink;
  }


}
