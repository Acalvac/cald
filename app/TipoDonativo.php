<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoDonativo extends Model
{
    protected $table='tipodonacion';
    protected $primaryKey='idtipodonacion';

    public $timestamps=false;

    protected $fillable=[
    	'donaciontipo',
    ];
}
