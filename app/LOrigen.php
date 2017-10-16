<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LOrigen extends Model
{
    protected $table='municipio';
    protected $primaryKey='idmunicipio';

    public $timestamps=false;

    protected $fillable=[
    	'municipio',
    ];
}
