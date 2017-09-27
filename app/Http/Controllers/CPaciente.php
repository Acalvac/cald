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
use App\Responsable;
use App\Anperinatal;
use App\Crecimiento;
use App\Infecciones;
use App\Enfermedades;
use App\ConviveAnimales;
use App\PersonalAtendio;
use App\MedicTomada;
use App\EnfPadecido;
use App\VacunaTiene;
use App\Control;
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
		->select('p.idpaciente','p.nombrepa','p.apellidopa','p.fechaingreso','r.nombre','r.telefono')
		->where('p.idstatus','=','5')
		->paginate(15);

		return view('pacientes.index',['paciente'=>$paciente]);
	}
	public function nuevopas()
	{	
		$parentesco = DB::table('parentesco')->get();
		$religion = DB::table('religion')->get();
		$idioma = DB::table('idioma')->get();
		$anomalia = DB::table('anomalia')->get();
		$tipoinfeccion = DB::table('tipoinfeccion')->get();
		$tipoenfermedad = DB::table('tipoenfermedad')->get();
		$tipoanimal = DB::table('tipoanimal')->get();
		$personalat = DB::table('personalatiende')->get();
		$medicina = DB::table('medicina')->get();
		$vacunas = DB::table('vacunas')->get();
		return view('pacientes.nuevop',['parentesco'=>$parentesco,'religion'=>$religion,'idioma'=>$idioma,'anomalia'=>$anomalia,'tipoinfeccion'=>$tipoinfeccion,'tipoenfermedad'=>$tipoenfermedad,'tipoanimal'=>$tipoanimal,'personalat'=>$personalat,'medicina'=>$medicina,'vacunas'=>$vacunas]);
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

	        $infeccembarazo =$request->get('imde');
	        $enfcronicas =$request->get('ecdm');
	        $conviveanimal =$request->get('cmcad');
	        $personatendio =$request->get('tpamp');
	        $medicatomados =$request->get('mednatural');
	        $tuvocontrol =$request->get('tcp');

	        $enfepadecido = $request->get('enfpadecido');
	        $vacunastiene = $request->get('vacunass');

	        $miArrayInf = $request->itemsInf;
	        $miArrayEn = $request->itemsEn;
	        $miArrayAn = $request->itemsAn;
	        $miArrayPer = $request->itemsPer;
	        $miArrayMed = $request->itemsMed;

	        $miArrayVac = $request->itemsVac;
	        $miArrayPad = $request->itemsPad;


	        $respo= new Responsable;
	        $respo-> nombre = $request->get('nombreres');
	        $respo-> identificacion = $request->get('identres');
	        $respo-> direccion = $request->get('direccionres');
	        $respo-> telefono = $request->get('telefonores');
	        $respo->save();

	        $paciente= new Paciente;
	        $paciente-> nombrepa=$request->get('nombrep');
	        $paciente-> apellidopa=$request->get('apellidop');
	        $paciente-> fechanac=$fecha;
	        $paciente-> fechaingreso=$mytime->toDateTimeString();
	        $paciente-> talla=$request->get('tallap');
	        $paciente-> peso=$request->get('pesop');
	        $paciente-> procedencia=$request->get('procedenciap');
	        $paciente-> lorigen=$request->get('origenp');
	        $paciente-> idresponsable=$respo->idresponsable;
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
                $familiar-> telefono = $value['6'];
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

            $perinatal = new Anperinatal;
            $perinatal-> infeccembarazo = $infeccembarazo;
            $perinatal-> enfcronicas = $enfcronicas;
            $perinatal-> conviveanimal = $conviveanimal;
            $perinatal-> personatendio = $personatendio;
            $perinatal-> medicatomados = $medicatomados;
            $perinatal-> duroparto = $request->get('tparto');
            $perinatal-> lloronacer = $request->get('lnin');
            $perinatal-> cianaticonacer = $request->get('pcnn');
            $perinatal-> maniobrarespira = $request->get('mnpr');
            $perinatal-> ictericonacido = $request->get('nipdn');
            $perinatal-> succiondepecho = $request->get('sbpdn');
            $perinatal-> manosypies = $request->get('tpym');
            $perinatal-> cordonantesdecaer = $request->get('icoac');
            $perinatal-> controlprenatal = $tuvocontrol;
            $perinatal-> idpaciente = $paciente->idpaciente;
            $perinatal->save();

            if ($infeccembarazo == 1 ) {
            	foreach ($miArrayInf as $key => $value) {
	                $infec= new Infecciones;
	                $infec-> idtipoinfeccion = $value['0'];
	                $infec-> idperinatal = $perinatal->idperinatal;
	                $infec->save();
	            }
            }
            if ($enfcronicas == 1 ) {
            	foreach ($miArrayEn as $key => $value) {
	                $enfer= new Enfermedades;
	                $enfer-> idtipoenfermedad = $value['0'];
	                $enfer-> idperinatal = $perinatal->idperinatal;
	                $enfer->save();
	            }
            }
            if ($conviveanimal == 1 ) {
            	foreach ($miArrayAn as $key => $value) {
	                $ca= new ConviveAnimales;
	                $ca-> idanimal = $value['0'];
	                $ca-> idperinatal = $perinatal->idperinatal;
	                $ca->save();
	            }
            }
            if ($personatendio == 1 ) {
            	foreach ($miArrayPer as $key => $value) {
	                $perat= new PersonalAtendio;
	                $perat-> idpersonalatiende = $value['0'];
	                $perat-> idperinatal = $perinatal->idperinatal;
	                $perat->save();
	            }
            }
            if ($medicatomados == 1 ) {
            	foreach ($miArrayMed as $key => $value) {
	                $medic= new MedicTomada;
	                $medic-> idmedicina = $value['0'];
	                $medic-> idperinatal = $perinatal->idperinatal;
	                $medic->save();
	            }
            }
            if ($tuvocontrol == 1 ) {
	            $ctl= new Control;
	            $ctl-> conquien = $request->get('conquien');
	            $ctl-> veces = $request->get('veces');
	            $ctl-> comentario = $request->get('comentario');
	            $ctl-> idperinatal = $perinatal->idperinatal;
	            $ctl->save();
            }

            $cres = new Crecimiento;
            $cres-> edadsostuvocabeza = $request->get('edadscn');
            $cres-> edadsentosolo = $request->get('edadss');
            $cres-> edadcamino = $request->get('edadcamino');
            $cres-> primeraspalabras = $request->get('edadepp');
            $cres-> notaronnoesnormal = $request->get('cnoeranormal');
            $cres-> notarondiferente = $request->get('qfpnd');
            $cres-> actitudtomada = $request->get('qatcnen');
            $cres-> hermanostiene = $request->get('chermanost');
            $cres-> enfepadecido = $enfepadecido;
            $cres-> ordecorresponde = $request->get('ordencor');
            $cres-> estabautizado = $request->get('bautizado');
            $cres-> idpaciente = $paciente->idpaciente;
            $cres->save();

            if ($enfepadecido == 1 ) {
            	foreach ($miArrayVac as $key => $value) {
	                $vac= new VacunaTiene;
	                $vac-> idvacuna = $value['0'];
	                $vac-> iddesarrollo = $cres->iddesarrollo;
	                $vac->save();
	            }
            }

            if ($vacunastiene == 1 ) {
            	foreach ($miArrayPad as $key => $value) {
	                $pades= new EnfPadecido;
	                $pades-> idtipoenfermedad = $value['0'];
	                $pades-> iddesarrollo = $cres->iddesarrollo;
	                $pades->save();
	            }
            }

		} catch (Exception $e) {
			
		}
	}
}
