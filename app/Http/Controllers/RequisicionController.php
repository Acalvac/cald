<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use App\Compra;
use App\Medicamento;
use App\Ubicacion;
use App\Almacen;
use App\Requisicion;
use App\RequisicionDetalle;
use Carbon\Carbon;  // para poder usar la fecha y hora
use Illuminate\Support\Facades\Auth;

class RequisicionController extends Controller
{
    //cantidad,idalmacen,idusuario,idpaciente,idtiporequiscion,idmedicamento.
    //Paciente dieta.
    //idpasdieta, idpaciente, iddieta, idusuario, fechain, fechafin, observacion.
    //

    public function index()
    {
        $requisicion = DB::table('requisicion as req')
        //->join('requisiciondetalle as rde','req.idrequisicion','=','rde.idrequisicion')
        ->join('paciente as p','req.idpaciente','=','p.idpaciente')
        ->join('usuario as U','req.idusuario','=','U.id')
        ->join('tiporequisiscion as tre','req.idtiporequisicion','=','tre.idtiporequisicion')
        ->select('req.idrequisicion','p.nombrepa','U.name','tre.nombre as tiporequisicion')
        ->get();
        return view('medicamento.requisicion.index',["requisicion"=>$requisicion]);
    }

    public function add(Request $request)
    {
        $medicamento = DB::table('medicamento as med')
        ->join('marca as mar','med.idmarca','=','mar.idmarca')
        ->join('presentacion as pre','med.idpresentacion','=','pre.idpresentacion')
        ->select('med.idmedicamento','mar.marca','pre.nombre as presentacion','med.medicamento')
        ->get();

        $paciente = DB::table('paciente as p')
        ->select('p.nombrepa','p.idpaciente')
        ->where('p.idstatus','=',5)
        ->get();

        return view('medicamento.requisicion.create',["medicamento"=>$medicamento,"paciente"=>$paciente]);
    }

    public function store(Request $request)
    {
        $this->validateRequest($request);
        try {
            DB::beginTransaction();

            $miArray = $request->items;

            $requisicion = new Requisicion;
            $requisicion-> idusuario =  Auth::user()->id;
            $requisicion-> idpaciente = $request->get('paciente');
            $requisicion-> idtiporequisicion = 1;

            $requisicion->save();


            foreach ($miArray as $key => $value) {
                $idmedicamento = $value['0'];

                $requisiciondetalle = new RequisicionDetalle;
                $requisiciondetalle->idrequisicion = $requisicion->idrequisicion;
                $requisiciondetalle->idmedicamento = $idmedicamento;
                $requisiciondetalle->cantidad = $value['1'];

                $medicamento = Medicamento::find($idmedicamento);
                $medicamento->cantidad = $medicamento->cantidad - $value['1'];
                $medicamento->save();
                $requisiciondetalle->save();

                $descuento = DB::select("call detalle_insertar(?,?)",array($idmedicamento,$value['1']));
            }

            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            return response()->json(array('error'=>'No se ha podido enviar la petición de agregar nuevo proveedor'),404);
        }
        return json_encode($requisicion);
    }

    public function modalrequisicion()
    {
        $medicamento = DB::table('medicamento as med')
        ->join('marca as mar','med.idmarca','=','mar.idmarca')
        ->join('presentacion as pre','med.idpresentacion','=','pre.idpresentacion')
        ->select('med.idmedicamento','med.medicamento','pre.nombre as presentacion','mar.marca','med.cantidad')
        ->get();
        
        return view('medicamento.requisicion.modalbuscarm',["medicamento"=>$medicamento]);
    }

    public function busqueda($id)
    {
        $medicamento = DB::table('medicamento as med')
        ->join('marca as mar','med.idmarca','=','mar.idmarca')
        ->join('presentacion as pre','med.idpresentacion','=','pre.idpresentacion')
        ->select('med.idmedicamento','mar.marca','pre.nombre as presentacion','med.medicamento','med.cantidad')
        ->where('med.idmedicamento','=',$id)
        ->first();

        return view ('medicamento.requisicion.modalmedicamento',["medicamento"=>$medicamento]);
    }

    public function show($id)
    {
        $detalle = DB::table('requisicion as req')
        //->join('requisiciondetalle as rde','req.idrequisicion','=','rde.idrequisicion')
        ->join('paciente as p','req.idpaciente','=','p.idpaciente')
        ->join('usuario as U','req.idusuario','=','U.id')
        ->join('tiporequisiscion as tre','req.idtiporequisicion','=','tre.idtiporequisicion')
        ->select('req.idrequisicion','p.nombrepa','U.name','tre.nombre as tiporequisicion')
        ->where('req.idrequisicion','=',$id)
        ->first();

        $requisiciondetalle = DB::table('requisiciondetalle as rde')
        ->join('requisicion as req','rde.idrequisicion','=','req.idrequisicion')
        ->join('medicamento as med','rde.idmedicamento','=','med.idmedicamento')
        ->join('marca as mar','med.idmarca','=','mar.idmarca')
        ->join('presentacion as pre','med.idpresentacion','=','pre.idpresentacion')
        ->select('med.medicamento','pre.nombre as presentacion','mar.marca','rde.cantidad','rde.iddetalle')
        ->where('rde.idrequisicion','=',$id)
        ->get();

        return view('medicamento.requisicion.detalle',["detalle"=>$detalle,"requisiciondetalle"=>$requisiciondetalle]);
    }

    public function validateRequest($request){                
        $rules=[
            'paciente' => 'required',
        ];

        $messages=[
            'required' => 'Debe ingresar :attribute.',
            'max'  => 'La capacidad del campo :attribute es :max'
        ];
        $this->validate($request, $rules,$messages);         
    }
}
