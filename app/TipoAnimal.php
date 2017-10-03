<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoAnimal extends Model
{
    protected $table='tipoanimal';
    protected $primaryKey='idanimal';

    public $timestamps=false;

    protected $fillable=[
    	'nombreanimal',
    ];
}
