<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enfermedades extends Model
{
    protected $table='enfermedades';
    protected $primaryKey='idenfermedad';

    public $timestamps=false;

    protected $fillable=[
    	'idperinatal',
    	'idtipoenfermedad',
    ];
}
