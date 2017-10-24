<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TipoPersona;
use App\Puesto;
use App\TipoAntecedente;
use App\Persona;
use App\Empleado;
use App\Tramite;
use App\EstadoCivil;

use Carbon\Carbon;  // para poder usar la fecha y hora
use Illuminate\Support\Facades\Auth; 


use Illuminate\Support\Facades\Log;
use DB;

class EmpleadoController1 extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request)
    {
        $empleado = Persona::all()->where('idtipopersona','=','1')->where('idstatus','=',1);
        return view('empleado.index',["empleado"=>$empleado]);
    }

    public function add(Request $request)
    {
        $tipopersona = TipoPersona::all()->where('idtipopersona','!=','2');
        $puesto = Puesto::all();
        $tipoantecedente = TipoAntecedente::all();
        $estadocivil = EstadoCivil::all();
        //return view('empleado.create')->with("tipopersona", $tipopersona);
        return view('empleado.create',["tipopersona"=>$tipopersona,"puesto"=>$puesto,"tipoantecedente"=>$tipoantecedente,"estadocivil"=>$estadocivil]);
    }

    public function store(Request $request)
    {
        try {
            $this->validateRequest($request);

            $miArray = $request->items;

            $today = Carbon::now();
            $year = $today->format('Y');

            $fechanacimiento=$request->get('fecha_nacimiento');
            $fechanacimiento=Carbon::createFromFormat('d/m/Y',$fechanacimiento);
            $fechanacimiento=$fechanacimiento->format('Y-m-d');


            $fechainicio=$request->get('fecha_inicio');
            $fechainicio=Carbon::createFromFormat('d/m/Y',$fechainicio);
            $fechainicio=$fechainicio->format('Y-m-d');

            $persona =new Persona;

            $persona-> nombre=$request->get('nombre');
            $persona-> apellido=$request->get('apellido');
            $persona-> direccion=$request->get('direccion');
            $persona-> telefono=$request->get('telefono');
            $persona-> idtipopersona=$request->get('idtipopersona');
            $persona-> idcivil=$request->get('idcivil');
            $persona-> nit=$request->get('nit');
            $persona-> dpi=$request->get('dpi');
            $persona-> imagen=$request->get('imagen');
            $persona-> correo=$request->get('correo');
            $persona-> fechanacimiento=$fechanacimiento;
            $persona-> idstatus=1;

            $persona->save();


            $empleado = new Empleado;

            $empleado-> idpersona   = $persona->idpersona;
            $empleado-> fechainicio = $fechainicio;

            $empleado-> tarjetasalud=$request->get('tarjetasalud');
            $empleado-> salario=$request->get('salario');
            $empleado-> idpuesto=$request->get('idpuesto');
            
            $empleado->save();

            $tramite = new Tramite;

            foreach ($miArray as $key => $value) {
                $tramite->idempleado = $empleado->idempleado;
                $tramite->idtipoantecedente = $value['0'];
                $fechavencimiento = $value['1'];

                $fechavencimiento=Carbon::createFromFormat('d/m/Y',$fechavencimiento);
                $fechavencimiento=$fechavencimiento->format('Y-m-d');

                $tramite-> fechavencimiento=$fechavencimiento;
                $tramite->save();
            }


        } catch (Exception $e) {
            DB::rollback();
            return response()->json(array('error'=>'No se ha podido enviar la peticion de agregar nuevo empreado'),404);
            
        }

        return json_encode($empleado);    
    }

    public function edit($id)
    {
        $puesto = Puesto::all();
        $estadocivil = EstadoCivil::all();
        $empleado = DB::table('empleado as emp')
        ->join('persona as per','emp.idpersona','=','per.idpersona')
        ->select('emp.fechainicio','emp.salario','emp.idpuesto','per.nombre','per.apellido','per.direccion','telefono','per.nit','per.dpi','per.correo','per.fechanacimiento','emp.idpersona')
        ->where('emp.idpersona','=',$id)
        ->first();
        return view('empleado.edit',["puesto"=>$puesto,"empleado"=>$empleado,"estadocivil"=>$estadocivil]);
    }

    public function update(Request $request, $id)
    {
        try {
            $this->validateRequestEdit($request);

            $idempleado = DB::table('empleado as emp')
            ->select('emp.idempleado')
            ->where('emp.idpersona','=',$id)
            ->first();

            $today = Carbon::now();
            $year = $today->format('Y');

            $fechanacimiento=$request->get('fecha_nacimiento');
            $fechanacimiento=Carbon::createFromFormat('d/m/Y',$fechanacimiento);
            $fechanacimiento=$fechanacimiento->format('Y-m-d');

            $fechainicio=$request->get('fecha_inicio');
            $fechainicio=Carbon::createFromFormat('d/m/Y',$fechainicio);
            $fechainicio=$fechainicio->format('Y-m-d');

            $persona =Persona::find($id);

            $persona-> nombre=$request->get('nombre');
            $persona-> apellido=$request->get('apellido');
            $persona-> direccion=$request->get('direccion');
            $persona-> telefono=$request->get('telefono');
            $persona-> idcivil=$request->get('idcivil');
            $persona-> nit=$request->get('nit');
            $persona-> dpi=$request->get('dpi');
            $persona-> imagen=$request->get('imagen');
            $persona-> correo=$request->get('correo');
            $persona-> fechanacimiento=$fechanacimiento;
            $persona-> idstatus=1;

            $persona->save();


            $empleado = Empleado::find($idempleado->idempleado);

            $empleado-> fechainicio = $fechainicio;
            $empleado-> tarjetasalud=$request->get('tarjetasalud');
            $empleado-> salario=$request->get('salario');
            $empleado-> idpuesto=$request->get('idpuesto');
            
            $empleado->save();


        } catch (Exception $e) {
            DB::rollback();
            return response()->json(array('error'=>'No se ha podido enviar la peticion de agregar nuevo empreado'),404);
            
        }

        return json_encode($empleado);
    }

    public function show($id)
    {
        $detalle = DB::table('persona as per')
        ->join('empleado as emp','per.idpersona','=','emp.idpersona')
        ->join('estadocivil as est','per.idcivil','=','est.idcivil')
        ->select('emp.idempleado','per.nombre','per.apellido','per.dpi','per.nit',
                'per.direccion','per.telefono','per.correo','est.nombre as estadocivil','per.fechanacimiento')
        ->where('per.idpersona','=',$id)
        ->first();

        $tramite = DB::table('tramite as tra')
        ->join('empleado as emp','tra.idempleado','=','emp.idempleado')
        ->join('tipoantecedente as tip','tra.idtipoantecedente','=','tip.idtipoantecedente')
        ->select('tra.idtramite','tip.nombreantecedente','tra.fechavencimiento')
        ->where('tra.idempleado','=',$detalle->idempleado)
        ->get();

        return view('empleado.detalle',["detalle"=>$detalle,"tramite"=>$tramite]);        
    }

    public function delete(Request $request)
    {
        $persona = Persona::find($request->empleado);
        $persona->idstatus = 2;
        $persona->save(); 
        return json_encode($persona);
    }


    public function validateRequest($request){                
        $rules=[
            'nombre' => 'required',
            'apellido' => 'required',
            'idtipopersona' => 'required',
            'correo'=>'required',
            'fecha_nacimiento'=> 'required',
            'idpuesto'=>'required',
            'fecha_inicio'=>'required',   
        ];

        $messages=[
            'required' => 'Debe ingresar :attribute.',
            'max'  => 'La capacidad del campo :attribute es :max'
        ];
        $this->validate($request, $rules,$messages);         
    }

    public function validateRequestEdit($request){                
        $rules=[
            'nombre' => 'required',
            'apellido' => 'required',
            'correo'=>'required',
            'fecha_nacimiento'=> 'required',
            'idpuesto'=>'required',
            'fecha_inicio'=>'required',   
        ];

        $messages=[
            'required' => 'Debe ingresar :attribute.',
            'max'  => 'La capacidad del campo :attribute es :max'
        ];
        $this->validate($request, $rules,$messages);         
    }   

}
