<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tramite extends Model
{
    protected $table='tramite';
    protected $primaryKey='idtramite';

    public $timestamps=false;

    protected $fillable=[
    	'idempleado',
    	'idtipoantecedente',
    	'fechavencimiento',
    	'adjunto',
    ];
}
