<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anomalias extends Model
{
    protected $table='anomaliafamiliar';
    protected $primaryKey='idanfamiliares';

    public $timestamps=false;

    protected $fillable=[
    	'idanomalia',
    	'idfamiliar',
    ];
}
