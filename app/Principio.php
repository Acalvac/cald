<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Principio extends Model
{
    protected $table='principioactivo';
    protected $primaryKey='idprincipio';

    public $timestamps=false;

    protected $fillable=[
    	'nombre',
    	'idtipo',
    ];
}
