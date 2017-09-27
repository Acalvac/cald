<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Responsable extends Model
{
    protected $table='responsable';
    protected $primaryKey='idresponsable';

    public $timestamps=false;

    protected $fillable=[
    	'nombre',
    	'identificacion',
    	'direccion',
    	'telefono',
    ];
}
