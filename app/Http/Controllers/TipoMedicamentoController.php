<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TipoMedicamento;

class TipoMedicamentoController extends Controller
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
        return view('medicamento.tipomedicamento.create');
    }

    public function addt(Request $request)
    {
        return view('medicamento.tipomedicamento.createt');
    }

    public function store(Request $request)
    {
        try {
            $this->validateRequest($request);

            $tipo =new TipoMedicamento;
            $tipo-> tipomedic =  $request->get('tipo_medicamento');
            $tipo->save();

        } catch (Exception $e) {
            DB::rollback();
            return response()->json(array('error'=>'No se ha podido enviar la petición de agregar nueva marca'),404);
        }
        return json_encode($tipo);    
    }

     public function validateRequest($request){                
        $rules=[
            'tipo_medicamento' => 'required',   
        ];

        $messages=[
            'required' => 'Debe ingresar :attribute.',
            'max'  => 'La capacidad del campo :attribute es :max'
        ];
        $this->validate($request, $rules,$messages);         
    }
}
