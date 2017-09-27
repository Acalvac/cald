<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VacunaTiene extends Model
{
    protected $table='vacunatiene';
    protected $primaryKey='idtienevacuna';

    public $timestamps=false;

    protected $fillable=[
    	'iddesarrollo',
    	'idvacuna',
    ];
}
