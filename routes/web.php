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

Route::get('/', function () {
    return view('auth/login');
});
Route::get('/logout', 'Auth\LoginController@logout');

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
	Route::get('/', 'HomeController@index');
	Route::get('/home', 'HomeController@index');
	Route::get('/{slug?}','HomeController@index');

});


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
	Route::put('updonativo/{id}','CBienhechor@updonativo');
	Route::put('deletebi/{id}','CBienhechor@deletebi');
});

// se agrega todas las rutas del paciente, examen medico, historial entre otros
Route::group(['prefix'=>'paciente'], function(){
	Route::get('index','CPaciente@index');
	Route::get('nuevo','CPaciente@nuevopas');
	Route::post('addpa','CPaciente@addpaciente');
});

// se agrega todas las rutas del medicamento, proveedor entre otros
Route::group(['prefix'=>'medicamento'], function(){
	//Medicamento
	Route::get('index','MedicamentoController@index');
	Route::get('medicamentoindex','MedicamentoController@medicamento');
	Route::get('add','MedicamentoController@add');
	Route::get('addm','MedicamentoController@addm');
	Route::get('busqueda/{id}','MedicamentoController@busqueda');
	Route::get('show/{id}','MedicamentoController@show');


	Route::post('store','MedicamentoController@store');
	//Compra
	Route::get('compra/index','CompraController@index');
	Route::get('compra/compraindex','CompraController@compra');
	Route::get('compra/add','CompraController@add');
	Route::post('compra/store','CompraController@store');
	//Proveedor
	Route::get ('proveedor/index','ProveedorController@index');
	Route::get ('proveedor/add','ProveedorController@add');
	Route::get ('proveedor/addp','ProveedorController@addp');
	Route::post('proveedor/store','ProveedorController@store');
	Route::get('proveedor/busqueda/{id}','ProveedorController@busqueda');


	//Marca
	Route::get('marca/index','MarcaController@index');
	Route::get('marca/add','MarcaController@add');
    Route::get('marca/addm','MarcaController@addm');
    Route::post('marca/store','MarcaController@store');
	//Tipo Medicamento
	Route::get('tipomedicamento/index','TipoMedicamentoController@index');
	Route::get('tipomedicamento/add','TipoMedicamentoController@add');
	Route::get('tipomedicamento/addt','TipoMedicamentoController@addt');
	Route::post('tipomedicamento/store','TipoMedicamentoController@store');

	//Ubicacion Medicamento
	Route::get('ubicacion/index','UbicacionController@index');
	Route::get('ubicacion/add','UbicacionController@add');
	Route::get('ubicacion/addu','UbicacionController@addu');
	Route::post('ubicacion/store','UbicacionController@store');
	Route::get('ubicacion/busqueda/{id}','UbicacionController@busqueda');

	//Composicion Medicamento

	Route::get('composicion/index','ComposicionController@index');
	Route::get('composicion/add','ComposicionController@index');
	Route::get('composicion/addc','ComposicionController@addc');
	Route::post('composicion/store','ComposicionController@store');
	Route::get('composicion/busqueda/{id}','ComposicionController@index');

	//Principio Activo
	Route::get('principio/index','PrincipioController@index');
	Route::get('principio/add','PrincipioController@index');
	Route::get('principio/addp','PrincipioController@addp');
	Route::post('principio/store','PrincipioController@store');
	Route::get('principio/busqueda/{id}','PrincipioController@busqueda');

	//Presentacion Medicamento
	Route::get('presentacion/index','PresentacionController@index');
	Route::get('presentacion/add','PresentacionController@index');
	Route::get('presentacion/addp','PresentacionController@addp');
	Route::post('presentacion/store','PresentacionController@store');
	Route::get('presentacion/busqueda/{id}','PresentacionController@busqueda');

	//Carga de modales para una compra
	Route::get('cargarbusqueda','CompraController@modalmedicamento');
	Route::get('proveedor/cargarbusqueda','CompraController@modalproveedor');
	Route::get('ubicacion/cargarbusqueda','CompraController@modalubicacion');
	Route::get('principio/cargarbusqueda','MedicamentoController@modalprincipio');

	//Requiscion.

	Route::get ('requisicion/index','RequisicionController@index');
	Route::get ('requisicion/add','RequisicionController@add');
	Route::get ('requisicion/addp','RequisicionController@addp');
	Route::post('requisicion/store','RequisicionController@store');
	Route::get ('requisicion/busqueda/{id}','RequisicionController@busqueda');


	Route::get('/logout', 'Auth\LoginController@logout');
});

// se agrega toda las rutas del empleado
Route::group(['prefix'=>'empleado'], function(){
	Route::get('index','EmpleadoController1@index');
	Route::get('add','EmpleadoController1@add');

	Route::post('store','EmpleadoController1@store');
	Route::get('edit/{id}','EmpleadoController1@edit');
	Route::post('update/{id}','EmpleadoController1@update');
	Route::post('delete','EmpleadoController1@modal');
	Route::get('show/{id}','EmpleadoController1@show');
	Route::get('/logout', 'Auth\LoginController@logout');
});


Route::group(['prefix'=>'seguridad'], function(){

	Route::get('index','UController@index');
	Route::get('add','UController@add');
	Route::post('store','UController@store');
	Route::get('editar_usuario/{id}', 'UController@editar_usuario');
	Route::get('cambiarclave/{id}/{clave}','UController@cambiarclave');
	Route::get('cambiarnombre/{id}/{name}','UController@cambiarname');
	Route::get('asignar_rol/{idusu}/{idrol}', 'UController@asignar_rol');
	Route::get('quitar_rol/{idusu}/{idrol}','UController@quitar_rol');
	Route::get('form_nuevo_rol', 'UController@form_nuevo_rol');
	Route::post('crear_rol', 'UController@crear_rol');
	Route::get('buscar_usuarios/{rol}/{dato?}', 'UController@buscar_usuarios'); 

	Route::get('/logout', 'Auth\LoginController@logout');
	Route::get('/{slug?}','HomeController@index');
	//Rutas del Rol
	Route::get('rol/index','RolController@index');
});

Route::get('paciente/examen/index','EmpleadoController1@index');
Route::get('paciente/examen/add','EmpleadoController1@add');
Route::get('paciente/historial/index','EmpleadoController1@index');
Route::get('paciente/historial/add','CPHistorialController@add');
Route::post('paciente/historial/store','CPHistorialController@store');
Route::get('paciente/historial/busqueda/{id}','CPHistorialController@busqueda');
Route::get('/{slug?}','HomeController@index');




