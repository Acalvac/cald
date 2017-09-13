<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Persona;
use App\Paciente;
use Illuminate\Support\Collection;
use DB;
use Validator;
use Carbon\Carbon;  // para poder usar la fecha y hora
use Response;

class CPaciente extends Controller
{
	public function index()
	{
		return view('pacientes.index');
	}
	public function nuevopas()
	{
		return view('pacientes.nuevop');
	}
}
