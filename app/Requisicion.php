<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Requisicion extends Model
{
    protected $table='requisicion';
    protected $primaryKey='idrequisicion';

    public $timestamps=false;

    protected $fillable=[
    	'idusuario',
    	'idpaciente',
    	'idtiporequisicion',
    ];
}
