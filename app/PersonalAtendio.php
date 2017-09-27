<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PersonalAtendio extends Model
{
    protected $table='personalatendio';
    protected $primaryKey='idpersonal';

    public $timestamps=false;

    protected $fillable=[
    	'idperinatal',
    	'idpersonalatiende',
    ];
}
