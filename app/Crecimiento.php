<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Crecimiento extends Model
{
    protected $table='crecydesarrollo';
    protected $primaryKey='iddesarrollo';

    public $timestamps=false;

    protected $fillable=[
    	'edadsostuvocabeza',
    	'edadsentosolo',
    	'edadcamino',
    	'primeraspalabras',
    	'notaronnoesnormal',
    	'notarondiferente',
    	'actitudtomada',
    	'hermanostiene',
    	'enfepadecido',
    	'ordecorresponde',
    	'estabautizado',
    	'idpaciente',
        'vacuna',
    ];
}
