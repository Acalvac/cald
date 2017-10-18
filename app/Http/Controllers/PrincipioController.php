<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TipoMedicamento;
use App\Principio;
use DB;
class PrincipioController extends Controller
{
	public function addp()
	{
    	$tipomedicamento = TipoMedicamento::all();
    	return view('medicamento.principioactivo.createp',["tipomedicamento"=>$tipomedicamento]);
	}

	public function store(Request $request)
    {
        try {
            $this->validateRequest($request);

            //$today = Carbon::now();
            //idmedicamento	medicamento	idtipo	idmarca
            $principioactivo =new Principio;
            $principioactivo-> idtipo =  $request->get('familia');
            $principioactivo-> nombre = $request->get('nombre');
            

            $principioactivo->save();

            $principioactivo = DB::table('principioactivo as pri')
            ->join('tipo as tip','pri.idtipo','=','tip.idtipo')
            ->select('pri.idtipo','pri.nombre','tip.tipomedic as familia')
            ->orderby('pri.idprincipio','desc')
            ->first();

        } catch (Exception $e) {
            DB::rollback();
            return response()->json(array('error'=>'No se ha podido enviar la petición de agregar nueva sustancia'),404);
        }
        return json_encode($principioactivo);
    }

    public function busqueda($id)
    {
        $principioactivo = DB::table('principioactivo as pri')
        ->join('tipo as tip','pri.idtipo','=','tip.idtipo')
        ->select('pri.idprincipio','pri.nombre','tip.tipomedic as familia')
        ->where('pri.idprincipio','=',$id)
        ->first();

        return view ('medicamento.medicamento.modalprincipio',["principioactivo"=>$principioactivo]);
    }

    public function validateRequest($request){                
        $rules=[
            'nombre' => 'required',   
        ];

        $messages=[
            'required' => 'Debe ingresar :attribute.',
            'max'  => 'La capacidad del campo :attribute es :max'
        ];
        $this->validate($request, $rules,$messages);         
    }
}
