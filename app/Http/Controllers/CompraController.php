<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use App\Compra;
use Carbon\Carbon;  // para poder usar la fecha y hora
use Illuminate\Support\Facades\Auth;

class CompraController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $compras = DB::table('compra as com')
        ->join('proveedor as pro','com.idproveedor','=','pro.idproveedor')
        ->join('usuario as U','com.idusuario','=','U.id')
        ->join('medicamento as med','com.idmedicamento','=','med.idmedicamento')
        ->join('marca as mar','med.idmarca','=','mar.idmarca')
        ->join('tipo as tip','med.idtipo','=','tip.idtipo')
        ->select('med.idmedicamento','med.medicamento','tip.tipomedic as tipo','mar.marca','pro.proveedor','com.fechacompra','com.fechavencimiento','com.precio','com.cantidad','com.idcompra','U.name')
        ->paginate(15);
        return view('medicamento.compra.index',["compras"=>$compras]);
    }

    public function compra()
    {
        //idmedicamento idproveedor idcompra    fechacompra fechavencimiento    precio  cantidad    idusuario

        $compras = DB::table('compra as com')
        ->join('proveedor as pro','com.idproveedor','=','pro.idproveedor')
        ->join('usuario as U','com.idusuario','=','U.id')
        ->join('medicamento as med','com.idmedicamento','=','med.idmedicamento')
        ->join('marca as mar','med.idmarca','=','mar.idmarca')
        ->join('tipo as tip','med.idtipo','=','tip.idtipo')
        ->select('med.idmedicamento','med.medicamento','tip.tipomedic as tipo','mar.marca','pro.proveedor','com.fechacompra','com.fechavencimiento','com.precio','com.cantidad','com.idcompra','U.name')
        ->paginate(15);
        return view('medicamento.compra.compra',["compras"=>$compras]);
    }


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

            $fechacompra=$request->get('fecha_compra');
            $fechacompra=Carbon::createFromFormat('d/m/Y',$fechacompra);
            $fechacompra=$fechacompra->format('Y-m-d');

            $fechavencimiento=$request->get('fecha_vencimiento');
            $fechavencimiento=Carbon::createFromFormat('d/m/Y',$fechavencimiento);
            $fechavencimiento=$fechavencimiento->format('Y-m-d');

            $compra =new Compra;
            $compra-> idmedicamento =  $request->get('idmedicamento');
            $compra-> idproveedor = $request->get('idproveedor');
            $compra-> fechacompra = $fechacompra;
            $compra-> fechavencimiento = $fechavencimiento;
            $compra-> precio = $request->get('precio');
            $compra-> cantidad = $request->get('cantidad');
            $compra-> idusuario = Auth::user()->id;

            $compra->save();

        } catch (Exception $e) {
            DB::rollback();
            return response()->json(array('error'=>'No se ha podido enviar la petición de agregar nuevo medicamento'),404);
        }
        return json_encode($compra);    
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
