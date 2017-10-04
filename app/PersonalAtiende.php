<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PersonalAtiende extends Model
{
    protected $table='personalatiende';
    protected $primaryKey='idpersonalatiende';

    public $timestamps=false;

    protected $fillable=[
    	'nombre',
    ];
}
