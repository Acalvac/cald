<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $table='persona';
    protected $primaryKey='idpersona';

    public $timestamps=false;

    protected $fillable=[
    	'nombre',
    	'apellido',
    	'direccion',
    	'telefono',
    	'idtipopersona',
    	'estadocivil',
    	'nit',
    	'dpi',
    	'imagen',
    	'correo',
    	'fechanacimiento',
    	'idstatus',
        'permanente',
    ];

    public function scopePersona($query,$dato="")
    {
        return $query->where('nombre','like','%'.$dato.'%')
            ->orwhere('apellido','like','%'.$dato.'%')
            ->orwhere(\DB::raw("CONCAT(nombre,' ',apellido)"),'like','%'.$dato.'%');
    }
}
