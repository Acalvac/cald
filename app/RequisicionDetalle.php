<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequisicionDetalle extends Model
{
    protected $table='requisiciondetalle';
    protected $primaryKey='iddetalle';

    public $timestamps=false;

    protected $fillable=[
    	'cantidad',
    	'idmedicamento',
    	'idrequisicion',
    ];
}
