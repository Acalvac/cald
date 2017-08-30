<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoMedicamento extends Model
{
    protected $table='tipo';
    protected $primaryKey='idtipo';

    public $timestamps=false;

    protected $fillable=[
    	'tipomedic',
    ];
}
