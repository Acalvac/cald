<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicamento extends Model
{
    protected $table='medicamento';
    protected $primaryKey='idmedicamento';

    public $timestamps=false;

    protected $fillable=[
    	'medicamento',
    	'cantidad',
    	'idmarca',
    	'idpresentacion',
    ];
}
