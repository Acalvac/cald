<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Infecciones extends Model
{
    protected $table='infecciones';
    protected $primaryKey='idinfecciones';

    public $timestamps=false;

    protected $fillable=[
    	'idperinatal',
    	'idtipoinfeccion',
    ];
}
