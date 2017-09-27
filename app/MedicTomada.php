<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MedicTomada extends Model
{
    protected $table='medictomada';
    protected $primaryKey='idmedic';

    public $timestamps=false;

    protected $fillable=[
    	'idperinatal',
    	'idmedicina',
    ];
}
