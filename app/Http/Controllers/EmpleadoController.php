<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;


use Illuminate\Support\Collection as Collection;
use App\Vacaciones;
use App\Vacadetalle;
use App\Tausencia;
//use App\HPMEConstants;
//use App\Http\Requests\VRequest;
use Validator;

use Carbon\Carbon;  // para poder usar la fecha y hora


use DB;
use PDF;

use Mail;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;


class EmpleadoController extends Controller
{
    public function index(Request $request)
    {
        return view('empleado.index');
    }

    public function add(Request $request)
    {
        return view('empleado.create');
    }
}
