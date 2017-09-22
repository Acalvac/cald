<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Persona;
use App\Paciente;
use App\Anomalias;
use App\Familiar;
use App\Familiares;
use App\Idiomas;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use DB;
use Validator;
use Carbon\Carbon;  // para poder usar la fecha y hora
use Response;

class CPaciente extends Controller
{
	public function index()
	{
		$paciente= DB::table('paciente as p')
		->join('responsable as r','r.idresponsable','=','p.idresponsable')
		->select('p.nombrepa','p.apellidopa','p.fechaingreso','r.nombre','r.telefono')
		->where('p.idstatus','=','5');
		->paginate(15);

		return view('pacientes.index');
	}
	public function nuevopas()
	{	
		$parentesco = DB::table('parentesco')->get();
		$religion = DB::table('religion')->get();
		$idioma = DB::table('idioma')->get();
		$anomalia = DB::table('anomalia')->get();
		return view('pacientes.nuevop',['parentesco'=>$parentesco,'religion'=>$religion,'idioma'=>$idioma,'anomalia'=>$anomalia]);
	}
	public function addpaciente(Request $request)
	{
		try {

			$contid= array();
			$cont=0;
			$mytime = Carbon::now('America/Guatemala');

	        $fechadon=$request->get('fechanacp');
	        $fechadona=Carbon::createFromFormat('d/m/Y',$fechadon);
	        $fecha=$fechadona->format('Y-m-d');

	        $miArray = $request->items;
	        $miArrayL = $request->itemsL;
	        $miArrayA = $request->itemsA;

	        $paciente= new Paciente;
	        $paciente-> nombrepa=$request->get('nombrep');
	        $paciente-> apellidopa=$request->get('apellidop');
	        $paciente-> fechanac=$fecha;
	        $paciente-> fechaingreso=$mytime->toDateTimeString();
	        $paciente-> talla=$request->get('tallap');
	        $paciente-> peso=$request->get('pesop');
	        $paciente-> procedencia=$request->get('procedenciap');
	        $paciente-> lorigen=$request->get('origenp');
	        //$paciente-> idresponsable=$request->get('observaciones');
	        $paciente-> idusuario=Auth::user()->id;
	        $paciente-> idstatus='5';
	        $paciente->save();
			

			foreach ($miArray as $key => $value) {
                $familiar= new Familiar;
                $familiar-> nombre = $value['0'];
                $familiar-> apellido = $value['1'];
                $fechanacf = $value['2'];
                $fechanacf=Carbon::createFromFormat('d/m/Y',$fechanacf);
                $fechanacf=$fechanacf->format('Y-m-d');
                $familiar-> fechanac = $fechanacf;
				$familiar-> ocupacion = $value['3'];
                $familiar-> talla = $value['4'];
                $familiar-> peso = $value['5'];
                $familiar-> idiomas = $value['6'];
                $familiar-> idreligion = $value['7'];
                $familiar-> idparentesco = $value['8'];                
                $familiar->save();

                //$contid= array($familiar->idfamiliar);
                for($i = 0; $i < count($value['0']); $i++) {
				    $contid[] = $familiar->idfamiliar;
				}
            }
            //dd($contid);
            foreach ($miArrayL as $key => $value) {
                $idioma= new Idiomas;
                $idioma-> ididioma = $value['0'];
                $idioma-> idfamiliar = $familiar->idfamiliar;
                $idioma->save();
            }

            foreach ($miArrayA as $key => $value) {
                $anomalia= new Anomalias;
                $anomalia-> idanomalia = $value['0'];
                $anomalia-> idfamiliar = $familiar->idfamiliar;
                $anomalia->save();
            }

            while($cont < count($contid))
            {
	            $familiares= new Familiares;
	            $familiares-> idpaciente = $paciente->idpaciente;
	            $familiares-> idfamiliar = $contid[$cont];
	            $familiares->save();
	            $cont ++;
            }
		} catch (Exception $e) {
			
		}
	}
}
