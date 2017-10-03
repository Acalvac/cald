<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoInfeccion extends Model
{
    protected $table='tipoinfeccion';
    protected $primaryKey='idtipoinfeccion';

    public $timestamps=false;

    protected $fillable=[
    	'nombre',
    ];
}
