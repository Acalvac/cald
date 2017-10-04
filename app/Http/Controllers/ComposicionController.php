<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ComposicionController extends Controller
{
    public function addc(Request $request)
    {

        $tipomedicamento = TipoMedicamento::all();
        return view('medicamento.composicion.createc',["tipomedicamento"=>$tipomedicamento]);
        //return view('empleado.create',["tipopersona"=>$tipopersona,"puesto"=>$puesto,"tipoantecedente"=>$tipoantecedente]);
    }
}
