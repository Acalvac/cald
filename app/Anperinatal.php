<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anperinatal extends Model
{
    protected $table='anteperinatal';
    protected $primaryKey='idperinatal';

    public $timestamps=false;

    protected $fillable=[
    	'infeccembarazo',
    	'enfcronicas',
    	'conviveanimal',
    	'personatendio',
    	'medicatomados',
    	'duroparto',
    	'lloronacer',
    	'cianaticonacer',
    	'maniobrarespira',
    	'ictericonacido',
    	'succiondepecho',
    	'manosypies',
    	'cordonantesdecaer',
    	'controlprenatal',
    	'idpaciente',
    ];
}
