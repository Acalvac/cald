<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoAntecedente extends Model
{
    protected $primaryKey = 'idtipoantecedente';
    protected $table = 'tipoantecedente';
    protected $fillable = array('nombreantecedente');
    public $timestamps = false;
}
