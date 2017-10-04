<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PresentacionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $medicamentos = DB::table('medicamento as med')
        ->join('marca as mar','med.idmarca','=','mar.idmarca')
        ->join('tipo as tip','med.idtipo','=','tip.idtipo')
        ->select('med.idmedicamento','med.medicamento','tip.tipomedic as tipo','mar.marca')
        ->paginate(15);

        return view('medicamento.medicamento.index',["medicamentos"=>$medicamentos]);
    }

    public function medicamento()
    {
        $medicamentos = DB::table('medicamento as med')
        ->join('marca as mar','med.idmarca','=','mar.idmarca')
        ->join('tipo as tip','med.idtipo','=','tip.idtipo')
        ->select('med.idmedicamento','med.medicamento','tip.tipomedic as tipo','mar.marca')
        ->paginate(15);
        return view('medicamento.medicamento.medicamentos',["medicamentos"=>$medicamentos]);
    }

    public function add(Request $request)
    {
        return view('medicamento.presentacion.create');
    }

    public function addm(Request $request)
    {
        return view('medicamento.presentacion.createp');
    }

    public function store(Request $request)
    {
        try {
            $this->validateRequest($request);

            $presentacion =new Presentacion;
            $presentacion-> nombre =  $request->get('nombre');
            $presentacion->save();

        } catch (Exception $e) {
            DB::rollback();
            return response()->json(array('error'=>'No se ha podido enviar la petición de agregar una presentación nueva'),404);
        }
        return json_encode($presentacion);    
    }

     public function validateRequest($request){                
        $rules=[
            'nombre' => 'required',   
        ];

        $messages=[
            'required' => 'Debe ingresar :attribute.',
            'max'  => 'La capacidad del campo :attribute es :max'
        ];
        $this->validate($request, $rules,$messages);         
    }
}
