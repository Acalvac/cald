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
use App\TipoInfeccion;
use App\TipoEnfermedad;
use App\TipoAnimal;
use App\PersonalAtiende;
use App\MedicinaP;
use App\Vacunas;
use App\LOrigen;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use DB;
use Validator;
use Carbon\Carbon;  // para poder usar la fecha y hora
use Response;
use PDF;
class CPaciente extends Controller
{
	public function index(Request $request)
	{
		$dato=trim($request->get('dato_buscado'));
		$paciente= DB::table('paciente as p')
		->join('responsable as r','r.idresponsable','=','p.idresponsable')
		->select('p.idpaciente','p.nombrepa','p.fechaingreso','r.nombre','r.telefono')
		->where('p.idstatus','=','5')
		->paginate(15);
		$origen = DB::table('municipio')->get();
		return view('pacientes.index',['paciente'=>$paciente,'origen'=>$origen,"dato"=>$dato]);
	}
	public function indexbu($dato="",Request $request)
    {
        
		$paciente= Paciente::Paciente($dato)
		->join('responsable as r','r.idresponsable','=','paciente.idresponsable')
		->select('paciente.idpaciente','paciente.nombrepa','paciente.fechaingreso','r.nombre','r.telefono')
		->where('paciente.idstatus','=','5')
		->paginate(15);
		$origen = DB::table('municipio')->get();
		return view('pacientes.indexbu',['paciente'=>$paciente,'origen'=>$origen,"dato"=>$dato]);
    }
	public function indexinc()
	{
		$paciente= DB::table('paciente as p')
		->join('responsable as r','r.idresponsable','=','p.idresponsable')
		->select('p.idpaciente','p.nombrepa','p.fechaingreso','r.nombre','r.telefono')
		->where('p.idstatus','=','6')
		->paginate(15);
		
		return view('pacientes.indexinc',['paciente'=>$paciente]);
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
		$origen = DB::table('municipio')->get();
		return view('pacientes.nuevop',['parentesco'=>$parentesco,'religion'=>$religion,'idioma'=>$idioma,'anomalia'=>$anomalia,'tipoinfeccion'=>$tipoinfeccion,'tipoenfermedad'=>$tipoenfermedad,'tipoanimal'=>$tipoanimal,'personalat'=>$personalat,'medicina'=>$medicina,'vacunas'=>$vacunas,'origen'=>$origen]);
	}
	public function listaruppas($id)
	{
		$paciente= DB::table('paciente as p')
		->join('responsable as r','r.idresponsable','=','p.idresponsable')
		->join('municipio as mun','mun.idmunicipio','=','p.idmunicipio')
		->select('p.idpaciente','p.nombrepa',(DB::raw('DATE_FORMAT(p.fechanac,"%d/%m/%Y") as fechana')),'mun.municipio as lorigen','p.idmunicipio','p.procedencia','p.talla','p.peso','p.fechaingreso','r.nombre','r.telefono')
		->where('p.idpaciente','=',$id)
		->first();
		return response()->json($paciente);
	}
	public function detallespaciente($id)
	{	
		$paciente= DB::table('paciente as p')
		->join('responsable as r','r.idresponsable','=','p.idresponsable')
		->join('municipio as mun','mun.idmunicipio','=','p.idmunicipio')
		->select('p.idpaciente','p.nombrepa','p.fechanac','mun.municipio as lorigen','p.procedencia','p.fechaingreso','r.nombre','r.telefono','r.identificacion','r.direccion')
		->where('p.idpaciente','=',$id)
		->first();
		$familiar = DB::table('paciente as p')
		->join('familiares as fs','fs.idpaciente','=','p.idpaciente')
		->join('familiar as f','f.idfamiliar','=','fs.idfamiliar')
		->join('parentesco as pco','pco.idparentesco','=','f.idparentesco')
		->join('religion as rn','rn.idreligion','=','f.idreligion')
		->select('f.idfamiliar','f.nombre','f.fechanac','f.talla','f.peso','f.ocupacion','f.anomalias','f.idiomas','pco.parentesco','rn.religion')
		->where('fs.idpaciente','=',$id)
		->get();

		$antperinatal = DB::table('paciente as p')
		->join('anteperinatal as ap','ap.idpaciente','=','p.idpaciente')
		->select('ap.infeccembarazo','ap.enfcronicas','ap.conviveanimal','ap.duroparto','ap.lloronacer','ap.cianaticonacer','ap.maniobrarespira','ap.ictericonacido','ap.succiondepecho','ap.manosypies','ap.cordonantesdecaer','ap.controlprenatal','ap.personatendio','ap.medicatomados')
		->where('p.idpaciente','=',$id)
		->first();

		$infecciones = DB::table('paciente as p')
		->join('anteperinatal as ap','ap.idpaciente','=','p.idpaciente')
		->join('infecciones as in','in.idperinatal','=','ap.idperinatal')
		->join('tipoinfeccion as tin','tin.idtipoinfeccion','=','in.idtipoinfeccion')
		->select('in.idinfecciones','tin.nombre')
		->where('p.idpaciente','=',$id)
		->get();

		$enfermedad = DB::table('paciente as p')
		->join('anteperinatal as ap','ap.idpaciente','=','p.idpaciente')
		->join('enfermedades as en','en.idperinatal','=','ap.idperinatal')
		->join('tipoenfermedad as ten','ten.idtipoenfermedad','=','en.idtipoenfermedad')
		->select('en.idenfermedad','ten.nombre')
		->where('p.idpaciente','=',$id)
		->get();

		$conanimales = DB::table('paciente as p')
		->join('anteperinatal as ap','ap.idpaciente','=','p.idpaciente')
		->join('conviveanimals as ca','ca.idperinatal','=','ap.idperinatal')
		->join('tipoanimal as ta','ta.idanimal','=','ta.idanimal')
		->select('ca.idconvive','ta.nombreanimal')
		->where('p.idpaciente','=',$id)
		->get();

		$peratiende = DB::table('paciente as p')
		->join('anteperinatal as ap','ap.idpaciente','=','p.idpaciente')
		->join('personalatendio as pa','pa.idperinatal','=','ap.idperinatal')
		->join('personalatiende as po','po.idpersonalatiende','=','pa.idpersonalatiende')
		->select('pa.idpersonal','po.nombre')
		->where('p.idpaciente','=',$id)
		->get();

		$medicina = DB::table('paciente as p')
		->join('anteperinatal as ap','ap.idpaciente','=','p.idpaciente')
		->join('medictomada as mt','mt.idperinatal','=','ap.idperinatal')
		->join('medicina as m','m.idmedicina','=','mt.idmedicina')
		->select('mt.idmedic','m.nombre')
		->where('p.idpaciente','=',$id)
		->get();

		$cresydesa = DB::table('paciente as p')
		->join('crecydesarrollo as cyd','cyd.idpaciente','=','p.idpaciente')
		->select('cyd.edadsostuvocabeza','cyd.edadsentosolo','cyd.edadcamino','cyd.primeraspalabras','cyd.notaronnoesnormal','cyd.notarondiferente','cyd.actitudtomada','cyd.hermanostiene','cyd.enfepadecido','cyd.ordecorresponde','cyd.estabautizado','cyd.vacuna')
		->where('p.idpaciente','=',$id)
		->first();

		$vacunast = DB::table('paciente as p')
		->join('crecydesarrollo as cyd','cyd.idpaciente','=','p.idpaciente')
		->join('vacunatiene as vt','vt.iddesarrollo','=','cyd.iddesarrollo')
		->join('vacunas as v','v.idvacuna','=','vt.idvacuna')
		->select('vt.idtienevacuna','v.vacuna')
		->where('p.idpaciente','=',$id)
		->get();

		$enferpadecido = DB::table('paciente as p')
		->join('crecydesarrollo as cyd','cyd.idpaciente','=','p.idpaciente')
		->join('enfpadecido as en','en.iddesarrollo','=','cyd.iddesarrollo')
		->join('tipoenfermedad as ten','ten.idtipoenfermedad','=','en.idtipoenfermedad')
		->select('en.idenfpadecido','ten.nombre')
		->where('p.idpaciente','=',$id)
		->get();

		return view('pacientes.detalles',['paciente'=>$paciente,'familiar'=>$familiar,'antperinatal'=>$antperinatal,'infecciones'=>$infecciones,'enfermedad'=>$enfermedad,'conanimales'=>$conanimales,'peratiende'=>$peratiende,'medicina'=>$medicina,'cresydesa'=>$cresydesa,'vacunast'=>$vacunast,'enferpadecido'=>$enferpadecido]);
	}
	public function pdf($id)
	{	
		$paciente= DB::table('paciente as p')
		->join('responsable as r','r.idresponsable','=','p.idresponsable')
		->join('municipio as mun','mun.idmunicipio','=','p.idmunicipio')
		->select('p.idpaciente','p.nombrepa','p.fechanac','mun.municipio as lorigen','p.procedencia','p.fechaingreso','r.nombre','r.telefono','r.identificacion','r.direccion')
		->where('p.idpaciente','=',$id)
		->first();
		$papa = DB::table('paciente as p')
		->join('familiares as fs','fs.idpaciente','=','p.idpaciente')
		->join('familiar as f','f.idfamiliar','=','fs.idfamiliar')
		->join('parentesco as pco','pco.idparentesco','=','f.idparentesco')
		->join('religion as rn','rn.idreligion','=','f.idreligion')
		->select('f.idfamiliar','f.nombre','f.fechanac','f.talla','f.peso','f.ocupacion','f.anomalias','f.idiomas','pco.parentesco','rn.religion')
		->where('pco.parentesco','=','Padre')
		->where('fs.idpaciente','=',$id)
		->first();

		$mama = DB::table('paciente as p')
		->join('familiares as fs','fs.idpaciente','=','p.idpaciente')
		->join('familiar as f','f.idfamiliar','=','fs.idfamiliar')
		->join('parentesco as pco','pco.idparentesco','=','f.idparentesco')
		->join('religion as rn','rn.idreligion','=','f.idreligion')
		->select('f.idfamiliar','f.nombre','f.fechanac','f.talla','f.peso','f.ocupacion','f.anomalias','f.idiomas','pco.parentesco','rn.religion')
		->where('pco.parentesco','=','Madre')
		->where('fs.idpaciente','=',$id)
		->first();

		$antperinatal = DB::table('paciente as p')
		->join('anteperinatal as ap','ap.idpaciente','=','p.idpaciente')
		->select('ap.infeccembarazo','ap.enfcronicas','ap.conviveanimal','ap.duroparto','ap.lloronacer','ap.cianaticonacer','ap.maniobrarespira','ap.ictericonacido','ap.succiondepecho','ap.manosypies','ap.cordonantesdecaer','ap.controlprenatal','ap.personatendio','ap.medicatomados')
		->where('p.idpaciente','=',$id)
		->first();

		$infecciones = DB::table('paciente as p')
		->join('anteperinatal as ap','ap.idpaciente','=','p.idpaciente')
		->join('infecciones as in','in.idperinatal','=','ap.idperinatal')
		->join('tipoinfeccion as tin','tin.idtipoinfeccion','=','in.idtipoinfeccion')
		->select('in.idinfecciones','tin.nombre')
		->where('p.idpaciente','=',$id)
		->get();

		$enfermedad = DB::table('paciente as p')
		->join('anteperinatal as ap','ap.idpaciente','=','p.idpaciente')
		->join('enfermedades as en','en.idperinatal','=','ap.idperinatal')
		->join('tipoenfermedad as ten','ten.idtipoenfermedad','=','en.idtipoenfermedad')
		->select('en.idenfermedad','ten.nombre')
		->where('p.idpaciente','=',$id)
		->get();

		$conanimales = DB::table('paciente as p')
		->join('anteperinatal as ap','ap.idpaciente','=','p.idpaciente')
		->join('conviveanimals as ca','ca.idperinatal','=','ap.idperinatal')
		->join('tipoanimal as ta','ta.idanimal','=','ta.idanimal')
		->select('ca.idconvive','ta.nombreanimal')
		->where('p.idpaciente','=',$id)
		->get();

		$peratiende = DB::table('paciente as p')
		->join('anteperinatal as ap','ap.idpaciente','=','p.idpaciente')
		->join('personalatendio as pa','pa.idperinatal','=','ap.idperinatal')
		->join('personalatiende as po','po.idpersonalatiende','=','pa.idpersonalatiende')
		->select('pa.idpersonal','po.nombre')
		->where('p.idpaciente','=',$id)
		->get();

		$medicina = DB::table('paciente as p')
		->join('anteperinatal as ap','ap.idpaciente','=','p.idpaciente')
		->join('medictomada as mt','mt.idperinatal','=','ap.idperinatal')
		->join('medicina as m','m.idmedicina','=','mt.idmedicina')
		->select('mt.idmedic','m.nombre')
		->where('p.idpaciente','=',$id)
		->get();

		$cresydesa = DB::table('paciente as p')
		->join('crecydesarrollo as cyd','cyd.idpaciente','=','p.idpaciente')
		->select('cyd.edadsostuvocabeza','cyd.edadsentosolo','cyd.edadcamino','cyd.primeraspalabras','cyd.notaronnoesnormal','cyd.notarondiferente','cyd.actitudtomada','cyd.hermanostiene','cyd.enfepadecido','cyd.ordecorresponde','cyd.estabautizado','cyd.vacuna')
		->where('p.idpaciente','=',$id)
		->first();

		$vacunast = DB::table('paciente as p')
		->join('crecydesarrollo as cyd','cyd.idpaciente','=','p.idpaciente')
		->join('vacunatiene as vt','vt.iddesarrollo','=','cyd.iddesarrollo')
		->join('vacunas as v','v.idvacuna','=','vt.idvacuna')
		->select('vt.idtienevacuna','v.vacuna')
		->where('p.idpaciente','=',$id)
		->get();

		$enferpadecido = DB::table('paciente as p')
		->join('crecydesarrollo as cyd','cyd.idpaciente','=','p.idpaciente')
		->join('enfpadecido as en','en.iddesarrollo','=','cyd.iddesarrollo')
		->join('tipoenfermedad as ten','ten.idtipoenfermedad','=','en.idtipoenfermedad')
		->select('en.idenfpadecido','ten.nombre')
		->where('p.idpaciente','=',$id)
		->get();

		$pdf= PDF::loadView('pacientes.pdfdetalle',['paciente'=>$paciente,'papa'=>$papa,'mama'=>$mama,'antperinatal'=>$antperinatal,'infecciones'=>$infecciones,'enfermedad'=>$enfermedad,'conanimales'=>$conanimales,'peratiende'=>$peratiende,'medicina'=>$medicina,'cresydesa'=>$cresydesa,'vacunast'=>$vacunast,'enferpadecido'=>$enferpadecido]);
        return $pdf->download('Admision.pdf');
	}
	public function addinfeccion(Request $request)
	{
		$this->validateRequest($request);
		$infec = new TipoInfeccion;
		$infec-> nombre=$request->get('nombre');
		$infec->save();
		return response()->json($infec);
	}
	public function addenfermedad (Request $request)
	{
		$this->validateRequest($request);
		$enfe = new TipoEnfermedad;
		$enfe-> nombre=$request->get('nombre');
		$enfe->save();
		return response()->json($enfe);
	}
	public function addanimal(Request $request)
	{
		$this->validateRequest($request);
		$ani = new TipoAnimal;
		$ani-> nombreanimal=$request->get('nombre');
		$ani->save();
		return response()->json($ani);
	}
	public function addpersonal (Request $request)
	{
		$this->validateRequest($request);
		$pers = new PersonalAtiende;
		$pers-> nombre=$request->get('nombre');
		$pers->save();
		return response()->json($pers);
	}
	public function addmedicina(Request $request)
	{
		$this->validateRequest($request);
		$med = new MedicinaP;
		$med-> nombre=$request->get('nombre');
		$med->save();
		return response()->json($med);
	}
	public function addvacuna(Request $request)
	{
		$this->validateRequest($request);
		$vac = new Vacunas;
		$vac-> vacuna=$request->get('nombre');
		$vac->save();
		return response()->json($vac);
	}
	/**/
	public function addidioma(Request $request)
	{
		$this->validateRequest($request);
		$idi = new Idiomas;
		$idi-> nombreid=$request->get('nombre');
		$idi->save();

		$idioma = DB::table('idioma')->get();
		return response()->json($idi);
	}
	public function getidioma()
	{
		$idioma=DB::table('idioma')->get();
		return view('pacientes.lenguaje',['idioma'=>$idioma]);
	}
	public function addanomalia(Request $request)
	{
		$this->validateRequest($request);
		$anomal = new Anomalias;
		$anomal-> anomalia=$request->get('nombre');
		$anomal->save();
		return response()->json($anomal);
	}
	public function getanomalia()
	{
		$anomalia=DB::table('anomalia')->get();
		return view('pacientes.anomalias',['anomalia'=>$anomalia]);
	}
	public function addlugar(Request $request)
	{
		$this->validateRequest($request);
		$lo = new LOrigen;
		$lo-> municipio=$request->get('nombre');
		$lo->save();
		return response()->json($lo);
	}
	public function uppasdatos(Request $request,$id)
	{
		try {
			DB::beginTransaction();
			$fechadon=$request->get('fechanac');
	        $fechadona=Carbon::createFromFormat('d/m/Y',$fechadon);
	        $fecha=$fechadona->format('Y-m-d');

			$paciente= Paciente::findOrFail($id);
	        $paciente-> nombrepa=$request->get('nombrep');
	        $paciente-> fechanac=$fecha;
	        $paciente-> talla=$request->get('talla');
	        $paciente-> peso=$request->get('peso');
	        $paciente-> procedencia=$request->get('procedencia');
	        $paciente-> idmunicipio=$request->get('origens');
	        $paciente-> idusuario=Auth::user()->id;
	        $paciente->save();
			DB::commit();
		} catch (Exception $e) {
			
		}
		return response()->json($paciente);
	}
	public function addpaciente(Request $request)
	{
		try {
			//$this->validateRequestP($request);
			DB::beginTransaction();
			$this->validateRequestP($request);
			$contid= array();
			$cont=0;
			$mytime = Carbon::now('America/Guatemala');

	        $fechadon=$request->get('fechanacp');
	        $fechadona=Carbon::createFromFormat('d/m/Y',$fechadon);
	        $fecha=$fechadona->format('Y-m-d');

	        $miArray = $request->items;
	        //$miArrayL = $request->itemsL;
	        //$miArrayA = $request->itemsA;

	        $infeccembarazo =$request->get('imde');
	        //dd($infeccembarazo);
	        $enfcronicas =$request->get('ecdm');
	        $conviveanimal =$request->get('cmcad');
	        $personatendio =$request->get('tpamp');
	        $medicatomados =$request->get('mednatural');
	        $tuvocontrol =$request->get('tcp');

	        $enfepadecido = $request->get('epadecido');
	        $vacunastiene = $request->get('vtiene');

	        $miArrayInf = $request->itemsInf;
	        $miArrayEn = $request->itemsEn;
	        $miArrayAn = $request->itemsAn;
	        $miArrayPer = $request->itemsPer;
	        $miArrayMed = $request->itemsMed;

	        $miArrayVac = $request->itemsVac;
	        $miArrayPad = $request->itemsPad;


	        $respo= new Responsable;
	        $respo-> nombre = $request->get('responsable');
	        $respo-> identificacion = $request->get('identres');
	        $respo-> direccion = $request->get('direccionres');
	        $respo-> telefono = $request->get('telefonores');
	        $respo->save();

	        $paciente= new Paciente;
	        $paciente-> nombrepa=$request->get('nino');
	        $paciente-> fechanac=$fecha;
	        $paciente-> fechaingreso=$mytime->toDateTimeString();
	        $paciente-> talla=$request->get('tallap');
	        $paciente-> peso=$request->get('pesop');
	        $paciente-> procedencia=$request->get('procedenciap');
	        $paciente-> idmunicipio=$request->get('origenp');
	        $paciente-> idresponsable=$respo->idresponsable;
	        $paciente-> idusuario=Auth::user()->id;
	        $paciente-> idstatus='5';
	        $paciente->save();
			//dd($paciente);
	        if ($miArray > 0) {
				foreach ($miArray as $key => $value) {
	                $familiar= new Familiar;
	                $familiar-> nombre = $value['0'];
	                //$familiar-> apellido = $value['1'];
	                /*$fechanacf = $value['1'];
	                $fechanacf=Carbon::createFromFormat('d/m/Y',$fechanacf);
	                $fechanacf=$fechanacf->format('Y-m-d');*/
	                $familiar-> fechanac = $value['1'];
					$familiar-> ocupacion = $value['2'];
	                $familiar-> talla = $value['3'];
	                $familiar-> peso = $value['4'];
	                $familiar-> idiomas = $value['5'];
	                $familiar-> idreligion = $value['6'];
	                $familiar-> anomalias = $value['7'];
	                $familiar-> idparentesco = $value['8'];                
	                $familiar->save();

	                //$contid= array($familiar->idfamiliar);
	                for($i = 0; $i < count($value['0']); $i++) {
					    $contid[] = $familiar->idfamiliar;
					}
	            }

	            while($cont < count($contid))
	            {
		            $familiares= new Familiares;
		            $familiares-> idpaciente = $paciente->idpaciente;
		            $familiares-> idfamiliar = $contid[$cont];
		            $familiares->save();
		            $cont ++;
	            }
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

            if ($infeccembarazo === 'Si' ) {
            	
            	
            	foreach ($miArrayInf as $key => $value) {
	                $infec= new Infecciones;
	                $infec-> idtipoinfeccion = $value['0'];
	                $infec-> idperinatal = $perinatal->idperinatal;
	                $infec->save();
	            }
	        
            }
            else
            {

            }
            if ($enfcronicas === 'Si' ) {
            	foreach ($miArrayEn as $key => $value) {
	                $enfer= new Enfermedades;
	                $enfer-> idtipoenfermedad = $value['0'];
	                $enfer-> idperinatal = $perinatal->idperinatal;
	                $enfer->save();
	            }
            }
            if ($conviveanimal === 'Si' ) {
            	foreach ($miArrayAn as $key => $value) {
	                $ca= new ConviveAnimales;
	                $ca-> idanimal = $value['0'];
	                $ca-> idperinatal = $perinatal->idperinatal;
	                $ca->save();
	            }
            }
            if ($personatendio === 'Si' ) {
            	foreach ($miArrayPer as $key => $value) {
	                $perat= new PersonalAtendio;
	                $perat-> idpersonalatiende = $value['0'];
	                $perat-> idperinatal = $perinatal->idperinatal;
	                $perat->save();
	            }
            }
            if ($medicatomados === 'Si' ) {
            	foreach ($miArrayMed as $key => $value) {
	                $medic= new MedicTomada;
	                $medic-> idmedicina = $value['0'];
	                $medic-> idperinatal = $perinatal->idperinatal;
	                $medic->save();
	            }
            }
            if ($tuvocontrol === 'Si' ) {
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
            $cres-> vacuna = $vacunastiene;
            $cres->save();

            if ($vacunastiene === 'Si' ) {
            	foreach ($miArrayVac as $key => $value) {
	                $vac= new VacunaTiene;
	                $vac-> idvacuna = $value['0'];
	                $vac-> iddesarrollo = $cres->iddesarrollo;
	                $vac->save();
	            }
            }

            if ($enfepadecido === 'Si' ) {
            	foreach ($miArrayPad as $key => $value) {
	                $pades= new EnfPadecido;
	                $pades-> idtipoenfermedad = $value['0'];
	                $pades-> iddesarrollo = $cres->iddesarrollo;
	                $pades->save();
	            }
            }
            
        DB::commit();

		} catch (Exception $e) {
			
		}
		return response()->json($paciente);
	}
	public function baja($id)
    {
        $st=Paciente::findOrFail($id);
        $st-> idstatus='6';
        $st->update();
        return response()->json($st);
        //return Redirect::to('empleado/listadoen');
    }
    public function recuperarp($id)
    {
        $st=Paciente::findOrFail($id);
        $st-> idstatus='5';
        $st->update();
        return response()->json($st);
        //return Redirect::to('empleado/listadoen');
    }

    public function validateRequest($request){                
        $rules=[
            'nombre' => 'required',
        ];

        $messages=[
            'required' => 'Debe ingresar :attribute.',
        ];
        $this->validate($request, $rules,$messages);         
    }
    public function validateRequestP($request){                
        $rules=[
        	'nino' => 'required',
            'responsable' => 'required',
        ];

        $messages=[
            //'required' => 'Debe ingresar datos del :attribute.',
        	'nino.required' => 'Debe ingresar almenos el nombre del Niño.',
        	'responsable.required' => 'Debe ingresar datos del Responsable.',
        ];
        $this->validate($request, $rules,$messages);         
    }
}
