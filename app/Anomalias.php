<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anomalias extends Model
{
    protected $table='anomalia';
    protected $primaryKey='idanomalia';

    public $timestamps=false;

    protected $fillable=[
    	'anomalia',
    ];
}
