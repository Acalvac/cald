<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MedicinaP extends Model
{
    protected $table='medicina';
    protected $primaryKey='idmedicina';

    public $timestamps=false;

    protected $fillable=[
    	'nombre',
    ];
}
