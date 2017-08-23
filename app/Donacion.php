<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donacion extends Model
{
   	protected $table='donacion';
    protected $primaryKey='idbienhechor';

    public $timestamps=false;

    protected $fillable=[
    	'fechaingreso',
    	'fechadonacion',
    	'monto',
    	'idpersona',
    	'idtipodonacion',
    	'descripcion',
    ];
}
