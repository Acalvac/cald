<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EnfPadecido extends Model
{
    protected $table='enfpadecido';
    protected $primaryKey='idenfpadecido';

    public $timestamps=false;

    protected $fillable=[
    	'iddesarrollo',
    	'idtipoenfermedad',
    ];
}
