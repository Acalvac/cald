<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Marca;

class MarcaController extends Controller
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

    public function add(Request $request)
    {
        return view('medicamento.marca.create');
    }

    public function addm(Request $request)
    {
        return view('medicamento.marca.createm');
    }

    public function store(Request $request)
    {
        try {
            $this->validateRequest($request);

            $marca =new Marca;
            $marca-> marca =  $request->get('marca');
            $marca->save();

        } catch (Exception $e) {
            DB::rollback();
            return response()->json(array('error'=>'No se ha podido enviar la petición de agregar nueva marca'),404);
        }
        return json_encode($marca);    
    }

     public function validateRequest($request){                
        $rules=[
            'marca' => 'required',   
        ];

        $messages=[
            'required' => 'Debe ingresar :attribute.',
            'max'  => 'La capacidad del campo :attribute es :max'
        ];
        $this->validate($request, $rules,$messages);         
    }
}
