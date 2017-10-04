<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Examen extends Model
{
    protected $table='pacientexamen';
    protected $primaryKey='idpasexamen';

    public $timestamps=false;

    protected $fillable=[
    	'idpaciente',
    	'idhistorialmedic',
    	'fecha',
    	'observacion',
    	'idusuario'
    ];
}
