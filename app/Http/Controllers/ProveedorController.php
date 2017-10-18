<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Proveedor;
use DB;
use PDF;

class ProveedorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $proveedores = DB::table('proveedor as pro')
        ->select('pro.idproveedor','pro.proveedor','pro.telefono','pro.direccion','pro.nit','pro.cuenta','pro.chequenombre')
        ->where('pro.estado','=',1)
        ->paginate(15);
        return view('medicamento.proveedor.index',["proveedores"=>$proveedores]);
    }

    public function add(Request $request)
    {
        return view('medicamento.proveedor.create');
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

        return json_encode($proveedor);
    }

    public function busqueda($id)
    {
        $proveedor = DB::table('proveedor as pro')
        ->select('pro.idproveedor','pro.proveedor','pro.telefono','pro.direccion','pro.nit','pro.cuenta','pro.chequenombre')
        ->where('pro.idproveedor','=',$id)
        ->where('pro.estado','=',1)
        ->first();

        return view ('medicamento.compra.modalproveedor',["proveedor"=>$proveedor]);
    }

    public function listaredit($id)
    {
        $proveedores = DB::table('proveedor as pro')
        ->select('pro.idproveedor','pro.proveedor','pro.telefono','pro.direccion','pro.nit','pro.cuenta','pro.chequenombre')
        ->where('pro.idproveedor','=',$id)
        ->first();

        return response()->json($proveedores);        
    }

    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            
            $this->validateRequest($request);

            $proveedor = Proveedor::findOrFail($id);
            $proveedor-> proveedor =  $request->get('proveedor');
            $proveedor-> telefono = $request->get('telefono');
            $proveedor-> direccion = $request->get('direccion');
            $proveedor-> nit = $request->get('nit');
            $proveedor-> cuenta = $request->get('cuenta');
            $proveedor-> chequenombre = $request->get('encargado_cheque');

            $proveedor->save();

            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            return response()->json(array('error'=>'No se ha podido actualizar al proveedor'),404);
        }
        return json_encode($proveedor);
    }

    public function validateRequest($request){
        $rules=[
            'proveedor' => 'required',
            'telefono' => 'required',
            'direccion' => 'required',   
        ];

        $messages=[
            'required' => 'Debe ingresar :attribute.',
            'max'  => 'La capacidad del campo :attribute es :max'
        ];
        $this->validate($request, $rules,$messages);         
    }
    public function eliminar(Request $request)
    {
        $proveedor = proveedor::find($request->idproveedor);
        $proveedor->estado = 0;
        $proveedor->save();

        return json_encode($proveedor);
    }
}
