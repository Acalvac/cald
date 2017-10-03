<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vacunas extends Model
{
    protected $table='vacunas';
    protected $primaryKey='idvacuna';

    public $timestamps=false;

    protected $fillable=[
    	'vacuna',
    ];
}
