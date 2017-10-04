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
	Route::get('indexb/{dato?}','CBienhechor@indexb');
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
	Route::get('pdfbienhechor','CBienhechor@pdfbienhechor');
	Route::get('indexinc','CBienhechor@indexinc');
	Route::put('recuperarb/{id}','CBienhechor@recuperarb');
});

// se agrega todas las rutas del paciente, examen medico, historial entre otros
Route::group(['prefix'=>'paciente'], function(){
	Route::get('index','CPaciente@index');
	Route::get('nuevo','CPaciente@nuevopas');
	Route::post('addpa','CPaciente@addpaciente');
	Route::post('addinfeccion','CPaciente@addinfeccion');
	Route::post('addenfermedad','CPaciente@addenfermedad');
	Route::post('addanimal','CPaciente@addanimal');
	Route::post('addpersonal','CPaciente@addpersonal');
	Route::post('addmedicina','CPaciente@addmedicina');
	Route::get('detallespaciente/{id}','CPaciente@detallespaciente');
	Route::get('pdf/{id}','CPaciente@pdf');
	Route::put('baja/{id}','CPaciente@baja');
	Route::get('indexinc','CPaciente@indexinc');
	Route::put('recuperarp/{id}','CPaciente@recuperarp');
});

// se agrega todas las rutas del medicamento, proveedor entre otros
Route::group(['prefix'=>'medicamento'], function(){
	//Medicamento
	Route::get('index','MedicamentoController@index');
	Route::get('medicamentoindex','MedicamentoController@medicamento');
	Route::get('add','MedicamentoController@add');
	Route::get('addm','MedicamentoController@addm');
	Route::get('busqueda/{id}','MedicamentoController@busqueda');


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


	//Carga de modales para una compra
	Route::get('cargarbusqueda','CompraController@modalmedicamento');
	Route::get('proveedor/cargarbusqueda','CompraController@modalproveedor');
	Route::get('ubicacion/cargarbusqueda','CompraController@modalubicacion');


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


Route::get('/{slug?}','HomeController@index');




