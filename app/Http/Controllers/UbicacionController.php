<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Ubicacion;

class UbicacionController extends Controller
{
    public function index(Request $request)
    {
    	$ubicacion = DB::table('ubicacion as u')
    	->select('u.idubicacion','u.habitacion','u.estanteria','u.coordenada')
    	->get();

    	return view('medicamento.ubicacion.index',["ubicacion"=>$ubicacion]);    	
    }

    public function create()
    {
    	$ubicacion = DB::table('ubicacion as u')
    	->select('u.idubicacion','u.habitacion','u.estanteria','u.coordenada')
    	->get();

    	return view('medicamento.ubicacion.create',["ubicacion"=>$ubicacion]);	
    }
}
