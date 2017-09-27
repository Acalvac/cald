<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Control extends Model
{
    protected $table='control';
    protected $primaryKey='idcontrol';

    public $timestamps=false;

    protected $fillable=[
    	'conquien',
    	'veces',
    	'comentario',
    	'idperinatal',
    ];
}
