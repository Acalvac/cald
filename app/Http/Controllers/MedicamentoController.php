<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Marca;
use App\TipoMedicamento;
use App\Medicamento;
use App\Presentacion;
use App\Composicion;
use DB;
class MedicamentoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $medicamentos = DB::table('medicamento as med')
        ->join('marca as mar','med.idmarca','=','mar.idmarca')
        ->join('presentacion as pre','med.idpresentacion','=','pre.idpresentacion')
        ->select('med.idmedicamento','med.medicamento','pre.nombre as presentacion','mar.marca','med.cantidad')
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

    public function show($id)
    {
        $detalle = DB::table('medicamento as med')
        ->join('marca as mar','med.idmarca','=','mar.idmarca')
        ->join('presentacion as pre','med.idpresentacion','=','pre.idpresentacion')
        ->select('med.idmedicamento','med.medicamento','pre.nombre as presentacion','mar.marca','med.cantidad')
        ->where('med.idmedicamento','=',$id)
        ->first();

        $composicion = DB::table('composicion as com')
        ->join('principioactivo as pri','com.idprincipio','=','pri.idprincipio')
        ->join('medicamento as med','com.idmedicamento','=','med.idmedicamento')
        ->join('tipo as tip','pri.idtipo','=','tip.idtipo')
        ->select('com.idcomposicion','com.concentracion','pri.nombre as principio','tip.tipomedic as familia')
        ->where('med.idmedicamento','=',$id)
        ->get();

        return view('medicamento.medicamento.detalle',["detalle"=>$detalle,"composicion"=>$composicion]);        
    }
    public function add(Request $request)
    {
        $tipomedicamento = TipoMedicamento::all();
        $presentacion = Presentacion::all();
        $marca = Marca::all();
        return view('medicamento.medicamento.create',["presentacion"=>$presentacion,"marca"=>$marca]);
        //return view('empleado.create',["tipopersona"=>$tipopersona,"puesto"=>$puesto,"tipoantecedente"=>$tipoantecedente]);
    }

    public function addm(Request $request)
    {

        $tipomedicamento = TipoMedicamento::all();
        $marca = Marca::all();
        return view('medicamento.medicamento.createm',["tipomedicamento"=>$tipomedicamento,"marca"=>$marca]);
        //return view('empleado.create',["tipopersona"=>$tipopersona,"puesto"=>$puesto,"tipoantecedente"=>$tipoantecedente]);
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            $this->validateRequest($request);

            //$today = Carbon::now();
            //idmedicamento	medicamento	idtipo	idmarca
            $miArray = $request->items;
            
            $medicamento =new Medicamento;
            $medicamento-> idpresentacion =  $request->get('idpresentacion');
            $medicamento-> idmarca = $request->get('idmarca');
            $medicamento-> medicamento = $request->get('medicamento');
            $medicamento-> cantidad = 0;

            $medicamento->save();

            $medicamentos = DB::table('medicamento as med')
            ->join('marca as mar','med.idmarca','=','mar.idmarca')
            ->join('presentacion as pre','med.idpresentacion','=','pre.idpresentacion')
            ->select('med.idmedicamento','med.medicamento','pre.nombre as presentacion','mar.marca')
            ->get();

            foreach ($miArray as $key => $value) {
                $composicion = new Composicion;
                $composicion->idmedicamento = $medicamento->idmedicamento;
                $composicion->idprincipio = $value['0'];
                $composicion->concentracion = $value['1'];

                $composicion->save();
            }
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            return response()->json(array('error'=>'No se ha podido enviar la petición de agregar nuevo medicamento'),404);
        }
        return json_encode($medicamentos);
    }

    public function busqueda($id)
    {
        $medicamento = DB::table('medicamento as med')
        ->join('marca as mar','med.idmarca','=','mar.idmarca')
        ->join('presentacion as pre','med.idpresentacion','=','pre.idpresentacion')
        ->select('med.idmedicamento','mar.marca','pre.nombre as presentacion','med.medicamento')
        ->where('med.idmedicamento','=',$id)
        ->first();

        return view ('medicamento.compra.modalmedicamento',["medicamento"=>$medicamento]);
    }

    public function modalprincipio()
    {
        $principioactivo = DB::table('principioactivo as pri')
        ->join('tipo as tip','pri.idtipo','=','tip.idtipo')
        ->select('pri.idprincipio','pri.nombre','tip.tipomedic as familia')
        ->get();

        return view('medicamento.principioactivo.modalbuscar',["principioactivo"=>$principioactivo]);
    }

    public function validateRequest($request){                
        $rules=[
            'medicamento' => 'required',   
        ];

        $messages=[
            'required' => 'Debe ingresar :attribute.',
            'max'  => 'La capacidad del campo :attribute es :max'
        ];
        $this->validate($request, $rules,$messages);         
    }
}
