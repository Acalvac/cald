<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use App\Compra;
use App\Medicamento;
use App\Ubicacion;
use App\Almacen;
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
        $proveedores = DB::table('proveedor as pro')
        ->select('pro.idproveedor','pro.proveedor','pro.telefono','pro.direccion','pro.nit','pro.cuenta','pro.chequenombre')
        ->paginate(15);
        return view('medicamento.proveedor.index',["proveedores"=>$proveedores]);
    }

    public function add(Request $request)
    {
        $medicamento = DB::table('medicamento as med')
        ->join('marca as mar','med.idmarca','=','mar.idmarca')
        ->join('presentacion as pre','med.idpresentacion','=','pre.idpresentacion')
        ->select('med.idmedicamento','mar.marca','pre.nombre as presentacion','med.medicamento')
        ->get();

        $proveedor = DB::table('proveedor as pro')
        ->select('pro.idproveedor','pro.proveedor')
        ->get();

        return view('medicamento.requisicion.create',["medicamento"=>$medicamento,"proveedor"=>$proveedor]);
    }

    public function addp(Request $request)
    {
        return view('medicamento.proveedor.createp');
    }

    public function store(Request $request)
    {
        try {
            $this->validateRequest($request);

            $proveedor = new Proveedor;
            $proveedor-> proveedor =  $request->get('proveedor');
            $proveedor-> telefono = $request->get('telefono');
            $proveedor-> direccion = $request->get('direccion');
            $proveedor-> nit = $request->get('nit');
            $proveedor-> cuenta = $request->get('cuenta');
            $proveedor-> chequenombre = $request->get('encargado_cheque');

            $proveedor->save();

        } catch (Exception $e) {
            DB::rollback();
            return response()->json(array('error'=>'No se ha podido enviar la petición de agregar nuevo proveedor'),404);
        }
        dd($proveedor);
        return json_encode($proveedor);
    }

    public function busqueda($id)
    {
        $proveedor = DB::table('proveedor as pro')
        ->select('pro.idproveedor','pro.proveedor','pro.telefono','pro.direccion','pro.nit','pro.cuenta','pro.chequenombre')
        ->where('pro.idproveedor','=',$id)
        ->first();

        return view ('medicamento.compra.modalproveedor',["proveedor"=>$proveedor]);
    }

    public function validateRequest($request){                
        $rules=[
            'proveedor' => 'required',
            'telefono' => 'required',
            'direccion' => 'required',
            'nit' => 'required',
            'cuenta' => 'required',
            'encargado_cheque'=> 'required',   
        ];

        $messages=[
            'required' => 'Debe ingresar :attribute.',
            'max'  => 'La capacidad del campo :attribute es :max'
        ];
        $this->validate($request, $rules,$messages);         
    }
}