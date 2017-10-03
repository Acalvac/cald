<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoEnfermedad extends Model
{
    protected $table='tipoenfermedad';
    protected $primaryKey='idtipoenfermedad';

    public $timestamps=false;

    protected $fillable=[
    	'nombre',
    ];
}
