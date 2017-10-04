<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    protected $table='paciente';
    protected $primaryKey='idpaciente';

    public $timestamps=false;

    protected $fillable=[
    	'nombrepa',
    	'fechanac',
    	'fechaingreso',
    	'direccion',
    	'numidentificacion',
    	'talla',
    	'peso',
    	'procedencia',
        'lorigen',
    	'idresponsable',
    	'idmunicipio',
    	'idusaurio',
        'idstatus',
    ];

    public function scopePaciente($query,$dato="")
    {
        return $query->where('nombrepa','like','%'.$dato.'%');
    }

}
