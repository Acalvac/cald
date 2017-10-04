<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Familiar extends Model
{
    protected $table='familiar';
    protected $primaryKey='idfamiliar';

    public $timestamps=false;

    protected $fillable=[
    	'nombre',
    	'telefono',
    	'fechanac',
    	'idparentesco',
    	'idreligion',
    	'talla',
    	'peso',
    	'ocupacion',
    	'anomalias',
        'idiomas',
    ];
}
