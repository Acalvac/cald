<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    protected $table='compra';
    protected $primaryKey='idcompra';

    public $timestamps=false;

    protected $fillable=[
    	'idmedicamento',
    	'idproveedor',
    	'fechacompra',
    	'fechavencimiento',
    	'precio',
    	'cantidad',
    	'idusuario',
    ];
}
