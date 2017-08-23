<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TipoPersona;
use App\Puesto;
use App\TipoAntecedente;
use App\Persona;
use App\Empleado;
use App\Tramite;

use Carbon\Carbon;  // para poder usar la fecha y hora
use Illuminate\Support\Facades\Auth; 


use Illuminate\Support\Facades\Log;

class EmpleadoController1 extends Controller
{
    public function index(Request $request)
    {
        $empleado = Persona::all()->where('idtipopersona','=','1');
        return view('empleado.index',["empleado"=>$empleado]);
    }

    public function add(Request $request)
    {
        $tipopersona = TipoPersona::all()->where('idtipopersona','!=','2');
        $puesto = Puesto::all();
        $tipoantecedente = TipoAntecedente::all();
        //return view('empleado.create')->with("tipopersona", $tipopersona);
        return view('empleado.create',["tipopersona"=>$tipopersona,"puesto"=>$puesto,"tipoantecedente"=>$tipoantecedente]);
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
            $persona-> estadocivil=$request->get('estadocivil');
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

    public function update()
    {}

    public function delate()
    {}

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

}
