<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoPersona extends Model
{
    protected $table='tipopersona';
    protected $primaryKey='idtipopersona';

    public $timestamps=false;

    protected $fillable=[
    	'tipopersona',
    ];
}
