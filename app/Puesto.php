<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Puesto extends Model
{
    protected $primaryKey = 'idpuesto';
    protected $table = 'puesto';
    protected $fillable = array('nombrepuesto');
    public $timestamps = false;

  
}
