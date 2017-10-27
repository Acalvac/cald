<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;  // para poder usar la fecha y hora
use Illuminate\Support\Facades\Auth;
use App\Examen;
use App\HistorialMedico;
use DateTime;

class CPHistorialController extends Controller
{
    public function add(Request $request)
    {
        $paciente = DB::table('paciente')->select('idpaciente','nombrepa')
                    ->where('idstatus','=',5)->get();
        return view('pacientes.historial.create',["paciente"=>$paciente]);
    }

    public function store(Request $request)
    {
        try {
            $this->validateRequest($request);

            $miArray = $request->observacion;

            $mytime = Carbon::now('America/Guatemala');
            $idpaciente = $request->paciente;

            $historial = new HistorialMedico;
            $historial-> temperatura        = $request->temperatura;
            $historial-> respiracionminuto  = $request->respiracion_minuto;
            $historial-> pulso              = $request->pulso_radial;
            $historial-> circunferencia     = $request->circunferencia_cefalica;
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
            $historial-> fecha              = $mytime->toDateTimeString();   
            $historial-> idpaciente         = $idpaciente;

            $historial->save();

		
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
    	->select('idpaciente','nombrepa','talla','peso')
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

    public function show($id)
    {
        $encabezado = DB::table('paciente')
        ->select('idpaciente','nombrepa','procedencia','lorigen','fechanac','fechaingreso')
        ->where('idpaciente','=',$id)
        ->first();

        $edad = new DateTime($encabezado->fechanac);
        $month = $edad->format('m');
        $day = $edad->format('d');
        $year = $edad->format('Y');

        $fnac = Carbon::createFromDate($year,$month,$day)->age;

        $detalle = DB::table('historialmedico as his')
        ->join('paciente as p','his.idpaciente','=','p.idpaciente')
        ->select('his.fecha','his.temperatura','his.respiracionminuto','his.pulso','his.idhistorialmedic')   
        ->orderby('his.fecha','desc')
        ->where('his.idpaciente','=',$id)
        ->get();



    /*        
        $detalle = DB::table('pacientexamen as pac')
        ->join('historialmedico as his','pac.idhistorialmedic','=','his.idhistorialmedic')
        ->join('usuario as u','pac.idusuario','=','u.id')
        ->join('paciente as p','his.idpaciente','=','p.idpaciente')
        ->select('med.idmedicamento','med.medicamento','pre.nombre as presentacion','mar.marca','med.cantidad')
        ->where('med.idmedicamento','=',$id)
        ->first();
    */
        return view('pacientes.historial.detalle',["encabezado"=>$encabezado,"detalle"=>$detalle,"edad"=>$fnac]);        
    }

    public function showe($id)
    {
        $historial = DB::table('historialmedico as his')
        ->select('his.idhistorialmedic','his.temperatura','his.respiracionminuto','his.pulso','his.circunferencia',
            'his.piel','his.cabeza','his.ojos','his.oidos','his.nariz','his.bacayfaringe','his.cuello','his.corazon','his.corazon','his.pulmones','his.torax','his.manoaxila','his.columna','his.abdomen','his.exsuperior','his.exinferior','his.muscoesqueletico','his.genitales','his.motor','his.reflejos','his.estadomental','his.reqconoce','his.fecha','his.idpaciente')
        ->where('his.idhistorialmedic','=',$id)
         ->first();

        $observacion = DB::table('pacientexamen as pac')
        ->join('historialmedico as his','pac.idhistorialmedic','=','his.idhistorialmedic')
        ->select('pac.observacion')
        ->where('pac.idhistorialmedic','=',$id)
        ->get();

        return view('pacientes.historial.detallee',["historial"=>$historial,"observacion"=>$observacion]);        
    }
}
