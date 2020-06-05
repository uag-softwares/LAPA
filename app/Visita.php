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
        'data', 'hora_inicial', 'hora_final', 'descricao', 'confirmada', 'user_id','slug',
    ];

    public $horas = [
        ['07:00', 7],
        ['07:30', 7.30],
        ['08:00', 8],
        ['08:30', 8.30],
        ['09:00', 9],
        ['09:30', 9.30],
        ['10:00', 10],
        ['10:30', 10.30],
        ['11:00', 11],
        ['11:30', 11.30],
        ['12:00', 12],
        ['12:30', 12.30],
        ['13:00', 13],
        ['13:30', 13.30],
        ['14:00', 14],
        ['14:30', 14.30],
        ['15:00', 15],
        ['15:30', 15.30],
        ['16:00', 16],
        ['16:30', 16.30],
        ['17:00', 17],
        ['17:30', 17.30],
        ['18:00', 18],
        ['18:30', 18.30],
        ['19:00', 19],
        ['19:30', 19.30],
        ['20:00', 20],
        ['20:30', 20.30],
        ['21:00', 21],
        ['21:30', 21.30],
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
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

    function horaFloatParaString($horaFloat) {
        array_push($this->horas, ['22:00', 22]);
        foreach($this->horas as $hora) {
            if($horaFloat == $hora[1]) {
                return $hora[0];
            }
        }
    }

    function diasFeriados($ano = null)
    {
        if(empty($ano))
        {
            $ano = (int)date('Y');
        }

        $pascoa = easter_date($ano); // Limite de 1970 ou após 2037 da easter_date PHP consulta http://www.php.net/manual/pt_BR/function.easter-date.php
        $dia_pascoa = date('j', $pascoa);
        $mes_pascoa = date('n', $pascoa);
        $ano_pascoa = date('Y', $pascoa);

        $feriados = array(
            // Tatas Fixas dos feriados Nacionail Basileiras
            mktime(0, 0, 0, 1, 1, $ano), // Confraternização Universal - Lei nº 662, de 06/04/49
            mktime(0, 0, 0, 4, 21, $ano), // Tiradentes - Lei nº 662, de 06/04/49
            mktime(0, 0, 0, 5, 1, $ano), // Dia do Trabalhador - Lei nº 662, de 06/04/49
            mktime(0, 0, 0, 9, 7, $ano), // Dia da Independência - Lei nº 662, de 06/04/49
            mktime(0, 0, 0, 10, 12, $ano), // N. S. Aparecida - Lei nº 6802, de 30/06/80
            mktime(0, 0, 0, 11, 2, $ano), // Todos os santos - Lei nº 662, de 06/04/49
            mktime(0, 0, 0, 11, 15, $ano), // Proclamação da republica - Lei nº 662, de 06/04/49
            mktime(0, 0, 0, 12, 25, $ano), // Natal - Lei nº 662, de 06/04/49

            // Essas Datas depem diretamente da data de Pascoa
            // mktime(0, 0, 0, $mes_pascoa, $dia_pascoa - 48, $ano_pascoa), //2ºferia Carnaval
            mktime(0, 0, 0, $mes_pascoa, $dia_pascoa - 47, $ano_pascoa), //3ºferia Carnaval
            mktime(0, 0, 0, $mes_pascoa, $dia_pascoa - 2, $ano_pascoa), //6ºfeira Santa
            mktime(0, 0, 0, $mes_pascoa, $dia_pascoa, $ano_pascoa), //Pascoa
            mktime(0, 0, 0, $mes_pascoa, $dia_pascoa + 60, $ano_pascoa), //Corpus Cirist

        );

        sort($feriados);

        for($i = 0; $i < count($feriados); $i++) {
            $feriados[$i] = date('d-m-Y', substr($feriados[$i], 0, 10));
        }

        return $feriados;
    }   
    
}
