<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Familiares extends Model
{
    protected $table='familiares';
    protected $primaryKey='idfamiliares';

    public $timestamps=false;

    protected $fillable=[
    	'idpaciente',
    	'idfamiliar',
    ];
}
