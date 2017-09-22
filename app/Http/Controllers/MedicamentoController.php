<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Marca;
use App\TipoMedicamento;
use App\Medicamento;
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
        ->join('tipo as tip','med.idtipo','=','tip.idtipo')
        ->select('med.idmedicamento','med.medicamento','tip.tipomedic as tipo','mar.marca','med.cantidad')
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

        $tipomedicamento = TipoMedicamento::all();
        $marca = Marca::all();
        return view('medicamento.medicamento.create',["tipomedicamento"=>$tipomedicamento,"marca"=>$marca]);
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
            $this->validateRequest($request);

            //$today = Carbon::now();
            //idmedicamento	medicamento	idtipo	idmarca
            $medicamento =new Medicamento;
            $medicamento-> idtipo =  $request->get('idtipo');
            $medicamento-> idmarca = $request->get('idmarca');
            $medicamento-> medicamento = $request->get('medicamento');
            $medicamento-> cantidad = 0;

            $medicamento->save();

            $medicamentos = DB::table('medicamento as med')
            ->join('marca as mar','med.idmarca','=','mar.idmarca')
            ->join('tipo as tip','med.idtipo','=','tip.idtipo')
            ->select('med.idmedicamento','med.medicamento','tip.tipomedic as tipo','mar.marca')
            ->get();

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
        ->join('tipo as tip','med.idtipo','=','tip.idtipo')
        ->select('med.idmedicamento','mar.marca','tip.tipomedic','med.medicamento')
        ->where('med.idmedicamento','=',$id)
        ->first();

        return view ('medicamento.compra.modalmedicamento',["medicamento"=>$medicamento]);
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
