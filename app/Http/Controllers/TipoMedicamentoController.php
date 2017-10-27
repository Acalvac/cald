<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TipoMedicamento;
use DB;

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

            $tipo = DB::table('tipo')
            ->select('idtipo','tipomedic')
            ->where('idtipo','=',$tipo->idtipo)
            ->first();

        } catch (Exception $e) {
            DB::rollback();
            return response()->json(array('error'=>'No se ha podido guardar el registro'),404);
        }
        return json_encode($tipo);
    }

    public function select($id)
    {
        $tipos = DB::table('tipo')
        ->select('idtipo','tipomedic')
        ->get();

        $tipo = DB::table('tipo')
        ->select('idtipo','tipomedic')
        ->where('idtipo','=',$id)
        ->first();

        return view('medicamento.tipomedicamento.select',["tipos"=>$tipos,"tipo"=>$tipo]);
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
