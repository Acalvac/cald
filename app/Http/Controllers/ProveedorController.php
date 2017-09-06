<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use PDF;

class ProveedorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $proveedores = DB::table('proveedor as pro')
        ->select('pro.idproveedor','pro.proveedor','pro.telefono','pro.direccion','pro.nit','pro.cuenta','pro.chequenombre')
        ->paginate(15);
        return view('medicamento.proveedor.index',["proveedores"=>$proveedores]);
    }
}
