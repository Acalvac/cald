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

class UController extends Controller
{
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

        return view("seguridad.usuario.modalcreate",array('usuario'=>$usuario,'persona'=>$persona,'role'=>$role));
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
        return view("seguridad.usuario.form_nuevo_rol")->with("roles",$roles);
    }
        
    public function crear_rol(Request $request){
        $rol=new Role;
        $rol->name=$request->input("rol_nombre") ;
        $rol->slug=$request->input("rol_slug") ;
        $rol->description=$request->input("rol_descripcion") ;
        if($rol->save())
        {
            return view("mensajes.msj_rol_creado")->with("msj","Rol agregado correctamente") ;
        }
        else
        {
            return view("mensajes.mensaje_error")->with("msj","...Hubo un error al agregar ;...") ;
        }
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

    public function cambiar_password(Request $request){
        $this->validateRequestPassword($request);
        $id=$request->get('idusuario');
        $usuario=User::find($id);
        $password=$request->input("password");
        $usuario->password=bcrypt($password);
        $r=$usuario->save();

        if($r){
            return response()->json($usuario);
        }
        else
        {
            return view("mensajes.msj_rechazado")->with("msj","Error al actualizar el password");
        }
    }
}
