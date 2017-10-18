<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Collection;

use App\User;  
use App\Empleado;
use App\Persona;
use App\TipoPersona;


use DB;
use Validator;
use Illuminate\Http\File;

use Carbon\Carbon;  // para poder usar la fecha y hora
use Response;


use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

use Caffeinated\Shinobi\Models\Role;
use Caffeinated\Shinobi\Models\Permission;
use Intervention\Image\Facades\Image as Image;

/* 
INSERT INTO `usuario` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `idpersona`, `estado`) VALUES(NULL,'Admin', 'admin@gmail.com','$2y$10$rSx2gd/BOl9/.waAXsfiLeVPTVwxNm.HRtZ2hZ0JfZ.JTtd/p1zxO','Z1W3F1iPRlOvax1KhE5RgiPmABv507npI2wBticUHeKBNEbiBFZ8OoeyXBhh', '2017-05-26 20:12:20', '2017-05-23 13:49:32','null','1');

INSERT INTO `usuario` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `estado`, `idpersona`) VALUES (NULL, 'admin', 'admin@gmail.com', '$2y$10$rSx2gd/BOl9/.waAXsfiLeVPTVwxNm.HRtZ2hZ0JfZ.JTtd/p1zxO', NULL, CURRENT_TIMESTAMP, '0000-00-00 00:00:00.000000', b'1', NULL);*/

class UController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function contenedor(Request $request)
    {
        return view('seguridad.usuario.contenedor');
    }
    public function index(Request $request)
    {
      
        $usuarios = User::name($request->get('name'))->orderBy('id','DESC')->paginate(15);
        $roles=Role::all();
        $persona=Persona::all();

        return view('seguridad.usuario.index',compact('usuarios','roles','persona'));  
    }

    public function buscar_usuarios($rol,$dato="")
    {
        $usuarios= User::Busqueda($rol,$dato)->paginate(15);  
        $roles=Role::all();
        $rolsel=$roles->find($rol);
        return view('seguridad.usuario.index')
            ->with("usuarios", $usuarios )
            ->with("rolsel", $rolsel )
            ->with("roles", $roles );       
    } 

    

    public function add()
    {
        $usuario = user::all();
        $role=Role::all();
        $persona = DB::table('persona as per')->select('per.nombre','per.apellido','per.idpersona')->where('per.idtipopersona','=',1)->get();

        return view("seguridad.usuario.create",array('usuario'=>$usuario,'persona'=>$persona,'role'=>$role));
        //return view('seguridad.usuario.modalcreate',['usuario'=>$usuario,'persona'=>$persona]);
    }
     

    public function store(Request $request)
    {
        $miArray = $request->items;
        try {
            DB::beginTransaction();

            $usuario=new User;
            $usuario->name=$request->get('name');
            $usuario->email=$request->get('email');
            $usuario->password=bcrypt($request->get('password'));
            $usuario->idpersona=$request->get('idpersona');
            $usuario->save();

            if(count($miArray)>0)
            {
                $usuariorol=User::find($usuario->id);
                foreach ($miArray as $key => $value) {
                    $usuariorol->assignRole($value['0']);
                }
            }
            
            DB::commit();
        }catch (\Exception $e) 
        {
        DB::rollback();
            return response()->json(array('error' => 'No se ha podido guardar el registro'),404);         
        }
        return response()->json($usuario);
    }

    public function editar_usuario($id)
    {
        $usuario=User::find($id);
        $roles=Role::all();
        return view("seguridad.usuario.edit")
            ->with("usuario",$usuario)
            ->with("roles",$roles);
    }

    public function asignar_rol($idusu,$idrol){
        $usuario=User::find($idusu);
        $usuario->assignRole($idrol);

        $usuario=User::find($idusu);
        $rolesasignados=$usuario->getRoles();
        return json_encode ($rolesasignados); 
    }

    public function quitar_rol($idusu,$idrol){
        $usuario=User::find($idusu);
        $usuario->revokeRole($idrol);
        $rolesasignados=$usuario->getRoles();
        return json_encode ($rolesasignados);
    }

    public function form_nuevo_rol(){
        //carga el formulario para agregar un nuevo rol
        $roles=Role::all();
        return view("seguridad.rol.form_nuevo_rol")->with("roles",$roles);
    }
        
    public function crear_rol(Request $request){
        try{

            $this->validateRequestRol($request);
            $rol=new Role;
            $rol-> name=$request->get('rol') ;
            $rol-> slug=$request->get('slug') ;
            $rol-> description=$request->get('descripcion');
            $rol->save();
        } catch (Exception $e) {
            DB::rollback();
            return response()->json(array('error'=>'No se ha podido enviar la petición de agregar nuevo rol'),404);
        }
        return json_encode($rol);  

    }
    
    public function borrar_rol($idrole){
        $role = Role::find($idrole);
        $role->delete();
        return "ok";
    }
    public function update(UsuarioFormRequest $request, $id)
    {
        $usuario=User::findOrFail($id);
        $usuario->name=$request->get('name');
        $usuario->email=$request->get('email');
        $usuario->password=bcrypt($request->get('password'));
        $usuario->id_persona=$request->get('id_persona');
        $usuario->update();
        	return Redirect::to('seguridad/usuario');
    }
        	
    public function destroy($id)
    {
        $usuario =DB::table('usuario')->where('id','=',$id)->delete();
    	return Redirect::to('seguridad/usuario');
    }

    public function cambiarclave($id,$password){
        $usuario=User::find($id);
        $usuario->password=bcrypt($password);
        $r=$usuario->save();

        if($r){
            $calculo[] = "Se modifico la clave";
            $usuario = Collection::make($calculo);
            return json_encode ($usuario);
        }
        else
        {
            $calculo[] = "error";
            $usuario = Collection::make($calculo);
            return json_encode ($usuario);
        }
    }

    public function cambiarname($id,$name){
        $usuario=User::find($id);
        $usuario->name =$name;
        $r=$usuario->save();

        if($r){
            $calculo[] = "Se modifico el usuario".' '.$usuario->name;
            $usuario = Collection::make($calculo);
            return json_encode ($usuario);
        }
        else
        {
            $calculo[] = "error";
            $usuario = Collection::make($calculo);
            return json_encode ($usuario);
        }
    }

    public function validateRequestRol($request){                
        $rules=[
            'rol' => 'required',
            'slug' => 'required',
            'descripcion' => 'required',
        ];

        $messages=[
            'required' => 'Debe ingresar :attribute.',
            'max'  => 'La capacidad del campo :attribute es :max'
        ];
        $this->validate($request, $rules,$messages);         
    }
}
