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

    public function add(Request $request)
    {
        return view('medicamento.marca.create');
    }

    public function addu(Request $request)
    {
        return view('medicamento.ubicacion.createu');
    }

    public function store(Request $request)
    {
        try {
            $this->validateRequest($request);

            //$today = Carbon::now();
            //idmedicamento medicamento idtipo  idmarca
            $ubicacion =new Ubicacion;
            $ubicacion-> habitacion =  $request->get('habitacion');
            $ubicacion-> estanteria = $request->get('estanteria');
            $ubicacion-> coordenada = $request->get('coordenada');


            $ubicacion->save();

            $ubicacion = DB::table('ubicacion as ubi')
            ->select('ubi.habitacion','ubi.estanteria','ubi.coordenada')
            ->orderby('ubi.idubicacion','desc')
            ->first();

        } catch (Exception $e) {
            DB::rollback();
            return response()->json(array('error'=>'No se ha podido enviar la petición de agregar nuevo medicamento'),404);
        }
      
            return json_encode($ubicacion);
        
    }

    public function busqueda($id)
    {
        $ubicacion = DB::table('ubicacion as u')
        ->select('u.idubicacion','u.habitacion','u.estanteria','u.coordenada')
        ->where('u.idubicacion','=',$id)
        ->first();

        return view ('medicamento.compra.modalubicacion',["ubicacion"=>$ubicacion]);
    }  

    public function validateRequest($request){                
        $rules=[
            'habitacion' => 'required',
            'estanteria' => 'required',
            'coordenada' => 'required',               
        ];

        $messages=[
            'required' => 'Debe ingresar :attribute.',
            'max'  => 'La capacidad del campo :attribute es :max'
        ];
        $this->validate($request, $rules,$messages);         
    }
}
