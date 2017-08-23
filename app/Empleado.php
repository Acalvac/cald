<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $table='empleado';
    protected $primaryKey='idempleado';

    public $timestamps=false;

    protected $fillable=[
    	'idpersona',
    	'fechainicio',
    	'puesto',
    	'salario',
    	'tarjetasalud',
    ];
}
