<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Marca;
use App\TipoMedicamento;
use App\Medicamento;

class MedicamentoController extends Controller
{
    public function add(Request $request)
    {

        $tipomedicamento = TipoMedicamento::all();
        $marca = Marca::all();
        return view('medicamento.medicamento.create',["tipomedicamento"=>$tipomedicamento,"marca"=>$marca]);
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

            $medicamento->save();

        } catch (Exception $e) {
            DB::rollback();
            return response()->json(array('error'=>'No se ha podido enviar la petición de agregar nuevo medicamento'),404);
        }
        return json_encode($medicamento);    
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
