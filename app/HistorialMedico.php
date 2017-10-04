<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HistorialMedico extends Model
{
    protected $table='historialmedico';
    protected $primaryKey='idhistorialmedic';

        public $timestamps=false;

    protected $fillable=[
    	'temperatura',
    	'respiracionporminuto',
    	'pulso',
    	'circunferencia',
    	'piel',
    	'cabeza',
    	'ojos',
    	'oidos',
    	'nariz',
    	'bacayfaringe',
    	'cuello',
    	'corazon',
    	'pulmones',
    	'torax',
    	'manoaxila',
    	'columna',
    	'abdomen',
    	'exsuperior',
    	'exinferior',
    	'muscoesqueletico',
    	'genitales',
    	'motor',
    	'reflejos',
    	'estadomental',
    	'reqconoce'
    ];
}
