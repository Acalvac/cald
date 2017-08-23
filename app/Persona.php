<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $table='persona';
    protected $primaryKey='idpersona';

    public $timestamps=false;

    protected $fillable=[
    	'nombre',
    	'apellido',
    	'direccion',
    	'telefono',
    	'idtipopersona',
    	'estadocivil',
    	'nit',
    	'dpi',
    	'imagen',
    	'correo',
    	'fechanacimiento',
    	'idstatus',
        'permanente',
    ];
}
