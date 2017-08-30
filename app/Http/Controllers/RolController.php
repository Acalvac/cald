<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
class RolController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $roles=Role::paginate(15);
        return view('seguridad.rol.index',compact('roles'));  
    }
}
