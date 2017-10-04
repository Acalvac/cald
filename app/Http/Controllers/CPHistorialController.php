<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;  // para poder usar la fecha y hora
use Illuminate\Support\Facades\Auth;
use App\Examen;
use App\HistorialMedico;

class CPHistorialController extends Controller
{
    public function add(Request $request)
    {
        $paciente = DB::table('paciente')->select('idpaciente','nombrepa','apellidopa')->get();
        return view('pacientes.historial.create',["paciente"=>$paciente]);
    }

    public function store(Request $request)
    {
        try {
            $this->validateRequest($request);

            $miArray = $request->observacion;

            $today = Carbon::now();
            $year = $today->format('Y');

/*presion_arterial
respiracion_minuto
pulso_radial
circuferencia_cefalica
piel
cabeza
ojos
oidos
nariz
boca_y_faringe
cuello
corazon
pulmones
torax
manos_axilas
columna
abdomen
extremidades_superiores
extremidades_inferiores
sistema_musco_esqueletico
genitales
observacion**/

            $historial = new HistorialMedico;
            $historial-> temperatura        =$request->temperatura;
            $historial-> respiracionminuto  =$request->respiracion_minuto;
            $historial-> pulso              = $request->pulso_radial;
            $historial-> circunferencia      = $request->circunferencia_cefalica;
            $historial-> piel 				= $request->piel;
            $historial-> cabeza 			= $request->cabeza;
            $historial-> ojos 				= $request->ojos;
            $historial-> oidos 				= $request->oidos;
            $historial-> nariz 				= $request->nariz;
            $historial-> bacayfaringe 		= $request->boca_y_faringe;
            $historial-> cuello				= $request->cuello;
            $historial-> corazon			= $request->corazon;
            $historial-> pulmones			= $request->pulmones;
            $historial-> torax				= $request->torax;
            $historial-> manoaxila 			= $request->manos_axilas;
            $historial-> columna 			= $request->columna;
            $historial-> abdomen            = $request->abdomen;
            $historial-> exsuperior         = $request->extremidades_superiores;
            $historial-> exinferior 		= $request->extremidades_inferiores;
            $historial-> muscoesqueletico 	= $request->sistema_musco_esqueletico;
            $historial-> genitales 			= $request->genitales;
            $historial-> motor 				= $request->motor;
            $historial-> reflejos 			= $request->reflejos;
            $historial-> estadomental 		= $request->estado_mental;
            $historial-> reqconoce 			= $request->reconoce;
            $historial->save();

            $idpaciente = $request->paciente;
            $mytime = Carbon::now('America/Guatemala');
		
            foreach ($miArray as $key => $value) {
                $examen = new Examen;
                $examen->idpaciente = $idpaciente;
                $examen->idhistorialmedic = $historial->idhistorialmedic;
                $examen->fecha = $mytime->toDateTimeString();
                $examen->observacion = $value['0'];
                $examen->idusuario = Auth::user()->id;
                $examen->save();
            }

        } catch (Exception $e) {
            DB::rollback();
            return response()->json(array('error'=>'No se ha podido enviar la peticion de agregar un nuevo examen'),404);
            
        }

        return json_encode($historial);    
    }

    public function busqueda($id)
    {
    	$paciente = DB::table('paciente')
    	->select('idpaciente','nombrepa','apellidopa','talla','peso')
    	->where('idpaciente','=',$id)
    	->get();
    	return json_decode($paciente);    
    }


    public function validateRequest($request){                
        $rules=[
            'observacion' => 'required',
        ];

        $messages=[
            'required' => 'Debe ingresar :attribute.',
            'max'  => 'La capacidad del campo :attribute es :max'
        ];
        $this->validate($request, $rules,$messages);         
    }
}
