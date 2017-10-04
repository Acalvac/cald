<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EstadoCivil extends Model
{
    protected $table='estadocivil';
    protected $primaryKey='idcivil';

    public $timestamps=false;

    protected $fillable=[
    	'nombre',
    ];
}
