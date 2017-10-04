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

    public function scopePersonas($query,$dato="")
    {
        return $query->where('persona.nombre','like','%'.$dato.'%')
            ->orwhere('persona.apellido','like','%'.$dato.'%')
            ->orwhere(\DB::raw("CONCAT(persona.nombre,' ',persona.apellido)"),'like','%'.$dato.'%');
    }
}
