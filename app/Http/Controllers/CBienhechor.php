<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Persona;
use App\Donacion;
use App\TipoDonativo;
use Illuminate\Support\Collection;
use DB;
use Validator;
use Carbon\Carbon;  // para poder usar la fecha y hora
use Response;
use PDF;
class CBienhechor extends Controller
{
    public function index(Request $request)
    {
        if ($request)
        {
            $dato=trim($request->get('dato_buscado'));
        	$bienhechor=DB::table('persona as p')
        	->join('status as sts','p.idstatus','=','sts.idstatus')
        	->join('tipopersona as tp','tp.idtipopersona','=','p.idtipopersona')
        	->select('p.idpersona','p.nombre','p.apellido','p.telefono','p.direccion','p.correo','sts.nombre as snombre')
     		//->where('sts.nombre','=','Activo')
     		//->where('tp.idtipopersona','=',2)
            //->orwhere('p.nombre','LIKE','%'.$query.'%')
     		->where('p.idstatus','=',3)
            //->where('p.nombre','LIKE','%'.$query.'%')
            ->paginate(15);

     		$tipop=DB::table('tipopersona as tp')->where('tp.tipopersona','=','Bienhechor')->get();
            $donacion=DB::table('tipodonacion as td')->get();
            return view('bienechor.index',["bienhechor"=>$bienhechor,"tipop"=>$tipop,"donacion"=>$donacion,"dato"=>$dato]);
        }
 		
    }
    public function indexb($dato="",Request $request)
    {
        //dd($dato);
            $bienhechor= Persona::Personas($dato)
            ->join('status as sts','persona.idstatus','=','sts.idstatus')
            ->join('tipopersona as tp','tp.idtipopersona','=','persona.idtipopersona')
            ->select('persona.idpersona','persona.nombre','persona.apellido','persona.telefono','persona.direccion','persona.correo','sts.nombre as snombre')
            ->where('persona.idstatus','=',3)
            ->paginate(15);

            $tipop=DB::table('tipopersona as tp')->where('tp.tipopersona','=','Bienhechor')->get();
            $donacion=DB::table('tipodonacion as td')->get();
            return view('bienechor.contentindex',["bienhechor"=>$bienhechor,"tipop"=>$tipop,"donacion"=>$donacion,"dato"=>$dato]);
    }
    public function indexinc(Request $request)
    {
        if ($request)
        {
            $query=trim($request->get('dato_buscado'));
            $bienhechor=DB::table('persona as p')
            ->join('status as sts','p.idstatus','=','sts.idstatus')
            ->join('tipopersona as tp','tp.idtipopersona','=','p.idtipopersona')
            ->select('p.idpersona','p.nombre','p.apellido','p.telefono','p.direccion','p.correo','sts.nombre as snombre')
            //->where('sts.nombre','=','Activo')
            //->where('tp.idtipopersona','=',2)
            //->orwhere('p.nombre','LIKE','%'.$query.'%')
            ->where('p.idstatus','=',4)
            ->where('p.nombre','LIKE','%'.$query.'%')
            ->paginate(15);

            $tipop=DB::table('tipopersona as tp')->where('tp.tipopersona','=','Bienhechor')->get();
            $donacion=DB::table('tipodonacion as td')->get();
        }
        return view('bienechor.indexinc',["bienhechor"=>$bienhechor,"tipop"=>$tipop,"donacion"=>$donacion,"dato_buscado"=>$query]);
    }
    public function detallesb(Request $request,$id)
    {
        $bienhechor=DB::table('persona as p')
        ->join('tipopersona as tp','tp.idtipopersona','=','p.idtipopersona')
        ->select('p.idpersona','p.nombre','p.apellido','p.telefono','p.direccion','p.correo','p.permanente','p.nit')
        ->orwhere('p.idpersona','=',$id)
        ->first();

        $donaciones=DB::table('donacion as d')
        ->join('persona as p','p.idpersona','=','d.idpersona')
        ->join('tipodonacion as td','td.idtipodonacion','=','d.idtipodonacion')
        ->select('d.idbienhechor','td.donaciontipo','d.monto','d.fechadonacion','d.descripcion')
        ->where('p.idpersona','=',$id)
        ->get();

        $donacion=DB::table('tipodonacion as td')->get();

        return view('bienechor.detalles',["bienhechor"=>$bienhechor,"donaciones"=>$donaciones,"donacion"=>$donacion]);
    }
    public function pdfbienhechor ()
    {
        //dd("mensaje");
        $bienhechor=DB::table('persona as p')
            ->join('tipopersona as tp','tp.idtipopersona','=','p.idtipopersona')
            ->select('p.idpersona','p.nombre','p.apellido','p.telefono','p.direccion','p.correo')
            ->where('p.idstatus','=',3)
            ->get();
        $pdf= PDF::loadView('bienechor.pdflistado',["bienhechor"=>$bienhechor]);
        return $pdf->download('Bienhechores.pdf'); 
    }
    public function listarupbienhe(Request $request, $id)
    {
        $bienhechor=DB::table('persona as p')
        ->join('tipopersona as tp','tp.idtipopersona','=','p.idtipopersona')
        ->select('p.idpersona','p.nombre','p.apellido','p.telefono','p.direccion','p.correo','p.permanente','p.nit')
        ->orwhere('p.idpersona','=',$id)
        ->first();
        return response()->json($bienhechor);
    }
    public function listarupdonativo(Request $request, $id)
    {
        $donativo=DB::table('donacion as d')
        ->join('tipodonacion as td','td.idtipodonacion','=','d.idtipodonacion')
        ->join('persona as p','p.idpersona','=','d.idpersona')
        ->select('d.idbienhechor',(DB::raw('DATE_FORMAT(d.fechadonacion,"%d/%m/%Y") as fechadonacion')),'d.monto','d.descripcion','td.donaciontipo','p.nombre','p.apellido')
        ->where('d.idbienhechor','=',$id)
        ->first();

        //(DB::raw('DATE_FORMAT(d.fechadonacion,"%d/%m/%Y") as fechadonacion'))
        return response()->json($donativo);
    }
    public function listarbienhe($id1)
    {
        $bienhechorT=DB::table('persona as p')
        ->select('p.idpersona','p.nombre','p.apellido')
        ->where('p.idpersona','=',$id1)
        ->first();
        return response()->json($bienhechorT);
    }
    public function instipodon(Request $request)
    {
        $this->validateRequestTD($request);
        $infec = new TipoDonativo;
        $infec-> donaciontipo=$request->get('tdonativo');
        $infec->save();
        return response()->json($infec);
    }
    public function nuevobienhechor(Request $request)
    {
    	//dd('prueba');
    	$this->validabienhechor($request);

    	$bienhe=new Persona;
    	$bienhe-> nombre=$request->get('nombreb');
    	$bienhe-> apellido=$request->get('apellidob');
    	$bienhe-> direccion=$request->get('direccion');
    	$bienhe-> telefono=$request->get('telefono');
    	$bienhe-> idtipopersona=$request->get('tipopersona');
    	$bienhe-> nit=$request->get('nit');
    	$bienhe-> correo=$request->get('correo');
    	$bienhe-> idstatus='3';
        $bienhe-> permanente=$request->get('tipobienhechor');
        $bienhe->save();
        //dd($bienhe);
        return response()->json($bienhe);
    }

    public function upbienhe(Request $request,$id)
    {
        $bienhe= Persona::findOrFail($id);
        $bienhe-> nombre=$request->get('nombreb');
        $bienhe-> apellido=$request->get('apellidob');
        $bienhe-> direccion=$request->get('direccion');
        $bienhe-> telefono=$request->get('telefono');
        $bienhe-> idtipopersona=$request->get('tipopersona');
        $bienhe-> nit=$request->get('nit');
        $bienhe-> correo=$request->get('correo');
        $bienhe-> idstatus='3';
        $bienhe-> permanente=$request->get('tipobienhechor');
        $bienhe->save();
        return response()->json($bienhe);
    }

    public function addonativos(Request $request)
    {
        $this->validadonativo($request);
        $mytime = Carbon::now('America/Guatemala');
        $fechadon=$request->get('fechadona');
        $fechadona=Carbon::createFromFormat('d/m/Y',$fechadon);
        $fecha=$fechadona->format('Y-m-d');

        $donar= new Donacion;
        $donar-> fechaingreso=$mytime->toDateTimeString();
        $donar-> fechadonacion=$fecha;
        $donar-> monto=$request->get('cantidad');
        $donar-> idpersona=$request->get('idb');
        $donar-> idtipodonacion=$request->get('tipodonativo');
        $donar-> descripcion=$request->get('observaciones');
        $donar->save();
        return response()->json($donar);
    }

    public function updonativo(Request $request,$id)
    {
        $this->validadonativo($request);
        $mytime = Carbon::now('America/Guatemala');
        $fechadon=$request->get('fechadona');
        $fechadona=Carbon::createFromFormat('d/m/Y',$fechadon);
        $fecha=$fechadona->format('Y-m-d');
        $donar= Donacion::findOrFail($id);
        $donar-> fechaingreso=$mytime->toDateTimeString();
        $donar-> fechadonacion=$fecha;
        $donar-> monto=$request->get('cantidad');
        $donar-> idtipodonacion=$request->get('tipodonativo');
        $donar-> descripcion=$request->get('observaciones');
        $donar->save();
        return response()->json($donar);
    }

    public function deletebi($id)
    {
        $st=Persona::findOrFail($id);
        $st-> idstatus='4';
        $st->update();
        return response()->json($st);
        //return Redirect::to('empleado/listadoen');
    }

    public function recuperarb($id)
    {
        $st=Persona::findOrFail($id);
        $st-> idstatus='3';
        $st->update();
        return response()->json($st);
        //return Redirect::to('empleado/listadoen');
    }

    public function validabienhechor($request){
        $rules=[
            'nombreb' => 'required',
            'telefono' => 'required',
            'direccion' => 'required',

        ];
        $messages=[
            'required' => 'Debe ingresar :attribute.',
        ];
        $this->validate($request, $rules,$messages);        
    }
    public function validadonativo($request){
        $rules=[
            'cantidad' => 'required',
            'fechadona' => 'required',
            'observaciones' => 'required',

        ];
        $messages=[
            'required' => 'Debe ingresar :attribute.',
        ];
        $this->validate($request, $rules,$messages);        
    }
    public function validateRequestTD($request){                
        $rules=[
            'tdonativo' => 'required',
        ];

        $messages=[
            'tdonativo.required' => 'Debe ingresar el tipo de donativo.',
        ];
        $this->validate($request, $rules,$messages);         
    }
}