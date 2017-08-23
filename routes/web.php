<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();
Route::get('/{slug?}','HomeController@index');

Route::get('/', function () {
    return view('auth/login');
});

Route::get('/logout', 'Auth\LoginController@logout');
Route::get('/home', 'HomeController@index');

// se agrega todas las rutas del bienechor, donaciones entre otros
Route::group(['prefix'=>'bienhechor'], function(){
	Route::get('index','CBienhechor@index');
	Route::post('add','CBienhechor@nuevobienhechor');
	Route::get('listarupbienhe/{id}','CBienhechor@listarupbienhe');
	Route::put('upbienhe/{id}','CBienhechor@upbienhe');
	Route::get('listarbienhe/{id1}','CBienhechor@listarbienhe');
	Route::post('addonativo','CBienhechor@addonativos');
	Route::get('listardetallesb/{id}','CBienhechor@detallesb');
	Route::get('listardetallesb/listarbienhe/{id1}','CBienhechor@listarbienhe');
	Route::get('listardetallesb/listarupdonativo/{id}','CBienhechor@listarupdonativo');
	Route::post('listardetallesb/addonativo','CBienhechor@addonativos');
	Route::put('listardetallesb/updonativo/{id}','CBienhechor@updonativo');
	//
});

// se agrega todas las rutas del paciente, examen medico, historial entre otros
Route::group(['prefix'=>'paciente'], function(){

	Route::get('add', function () {
    	return view('');
	});
});

// se agrega todas las rutas del medicamento, proveedor entre otros
Route::group(['prefix'=>'medicamento'], function(){

	Route::get('add', function () {
    	return view('');
	});
});

// se agrega toda las rutas del empleado
Route::group(['prefix'=>'empleado'], function(){
	Route::get('index','EmpleadoController1@index');
	//Route::get('add','EmpleadoController1@add');
	Route::get('add','EmpleadoController1@add');

	Route::post('store','EmpleadoController1@store');
	Route::post('update','EmpleadoController1@edit');
	Route::post('delete','EmpleadoController1@modal');
});


Route::group(['prefix'=>'seguridad'], function(){

	Route::get('index','UController@index');
	Route::get('add','UController@add');
	Route::post('store','UController@store');
	Route::get('editar_usuario/{id}', 'UController@editar_usuario');
});







