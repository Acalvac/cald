<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Composicion extends Model
{
    protected $table='composicion';
    protected $primaryKey='idcomposicion';

    public $timestamps=false;

    protected $fillable=[
    	'concentracion',
    	'idprincipio',
    	'idmedicamento',
    ];
}
