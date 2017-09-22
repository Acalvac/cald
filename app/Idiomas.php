<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Idiomas extends Model
{
    protected $table='idiomas';
    protected $primaryKey='ididiomas';

    public $timestamps=false;

    protected $fillable=[
    	'ididioma',
    	'idfamiliar',
    ];
}
