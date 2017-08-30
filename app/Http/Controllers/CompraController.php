<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class CompraController extends Controller
{
    public function add(Request $request)
    {
        $medicamento = DB::table('medicamento as med')
        ->join('marca as mar','med.idmarca','=','mar.idmarca')
        ->join('tipo as tip','med.idtipo','=','tip.idtipo')
        ->select('med.idmedicamento','mar.marca','tip.tipomedic','med.medicamento')
        ->get();

        $proveedor = DB::table('proveedor as pro')
        ->select('pro.idproveedor','pro.proveedor')
        ->get();

        return view('medicamento.compra.create',["medicamento"=>$medicamento,"proveedor"=>$proveedor]);
    }

    public function store(Request $request)
    {
        try {
            $this->validateRequest($request);

            //$today = Carbon::now();
            //idmedicamento	medicamento	idtipo	idmarca
            $medicamento =new Medicamento;
            $medicamento-> idtipo =  $request->get('idtipo');
            $medicamento-> idmarca = $request->get('idmarca');
            $medicamento-> medicamento = $request->get('medicamento');

            $medicamento->save();

        } catch (Exception $e) {
            DB::rollback();
            return response()->json(array('error'=>'No se ha podido enviar la petición de agregar nuevo medicamento'),404);
        }

        return json_encode($medicamento);    
    }

    public function validateRequest($request){                
        $rules=[
            'precio' => 'required',
            'cantidad' => 'required',
            'fecha_vencimiento' => 'required',
            'fecha_compra'=>'required',
            'idproveedor'=>'required',
            'idmedicamento'=>'required',   
        ];

        $messages=[
            'required' => 'Debe ingresar :attribute.',
            'max'  => 'La capacidad del campo :attribute es :max'
        ];
        $this->validate($request, $rules,$messages);         
    }
}
