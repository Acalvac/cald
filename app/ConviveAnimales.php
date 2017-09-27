<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConviveAnimales extends Model
{
    protected $table='conviveanimals';
    protected $primaryKey='idconvive';

    public $timestamps=false;

    protected $fillable=[
    	'idperinatal',
    	'idanimal',
    ];
}
