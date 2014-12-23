<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	if(Auth::check()){
		return View::make('layout');
	}else{
		return View::make('login');
	}
});

Route::get('inicio',function(){
	return View::make('admin/index');
});

//login y logOut
Route::post('login','BaseController@login');
Route::get('logOut', 'BaseController@logOut');

//menu
Route::get('menu','ModulosController@modulos');

//Modulos
Route::post('modulos/action', 'ModulosController@action');
Route::post('modulos/editar','ModulosController@getEditar');
Route::get('modulos/getModulo','ModulosController@getModulos');
Route::get('modulos/getPadre','ModulosController@getPadre');
Route::controller('modulos','ModulosController');

//Empleados
Route::post('empleados/action', 'UsersController@action');
Route::post('empleados/editar','UsersController@getDatos');
Route::get('empleados/getUser','UsersController@getUsers');
Route::get('empleados/getPerfil','UsersController@getPerfils');
Route::controller('empleados','UsersController');

//Perfiles
Route::post('perfiles/action', 'PerfilsController@action');
Route::post('perfiles/editar','PerfilsController@getEditar');
Route::get('perfiles/getPerfil','PerfilsController@getPerfils');
Route::controller('perfiles','PerfilsController');

//Permisos
Route::post('permisos/getPermisos', 'PermisosController@getPermisos');
Route::post('permisos/inserta_permiso', 'PermisosController@IPermiso');
Route::post('permisos/elimina_permiso', 'PermisosController@EPermiso');
Route::controller('permisos','PermisosController');

//Razas
Route::post('razas/action', 'RazasController@action');
Route::post('razas/editar','RazasController@getEditar');
Route::get('razas/get','RazasController@getRazas');
Route::controller('razas','RazasController');


//Tipo actividades
//Route::post('sub_actividad/action', 'SubactividadController@action');
Route::post('sub_actividad/editar','SubactividadesController@getEditar');
Route::get('sub_actividad/getSub_actividad','SubactividadesController@getSub_actividad');
Route::get('sub_actividad/action','SubactividadesController@action');
//Route::get('sub_actividad/action','SubactividadesController@action');
Route::controller('sub_actividad','SubactividadesController');

//Etapas
/*Route::post('etapas/action', 'EtapasController@action');
Route::post('etapas/editar','EtapasController@getEditar');
Route::get('etapas/getEtapa','EtapasController@getEtapas');
Route::controller('etapas','EtapasController');*/



//Entradas
Route::post('entradas/action', 'EntradasController@action');
Route::post('entradas/editar','EntradasController@getEditar');
Route::get('entradas/getEntradas','EntradasController@getEntradas');
Route::get('entradas/getProveedor','EntradasController@getProveedor');
Route::get('entradas/getRaza','EntradasController@getRaza');
Route::controller('entradas','EntradasController');

//actividades
//Route::post('actividades/action', 'ActividadesController@action');
Route::get('actividades/action','ActividadesController@action');
Route::post('actividades/editar','ActividadesController@getEditar');
Route::get('actividades/getactividades','ActividadesController@getActividades');
Route::get('actividades/getSub_actividad','ActividadesController@getSub_actividad');
Route::controller('actividades','ActividadesController');

/*Route::post('actividades/action', 'ActividadesController@action');
Route::post('actividades/editar','ActividadesController@getEditar');
Route::get('actividades/getactividades','ActividadesController@getActividades');
Route::get('actividades/gettipoactividad','ActividadesController@getTipoActividades');
Route::controller('actividades','ActividadesController');*/

//salidas
Route::post('salidas/action', 'SalidasController@action');
Route::post('salidas/editar','SalidasController@getEditar');
Route::get('salidas/getSalida','SalidasController@getSalidas');
Route::get('salidas/getGanado','SalidasController@getGanado');
Route::controller('salidas','SalidasController');

//proveedor
Route::post('proveedor/action', 'ProveedorController@action');
Route::post('proveedor/editar','ProveedorController@getEditar');
Route::get('proveedor/getProveedor','ProveedorController@getProveedor');
Route::controller('proveedor','ProveedorController');

//Reportes
Route::get('reporte_lista_animales', 'ReportesController@rep_x');
Route::get('reporte_listado_produccion', 'ReportesController@rep_y');
Route::get('reporte_nacimientos_fecha', 'ReportesController@rep_z');
Route::get('reporte_nacimientos_fecha/getFecha', 'ReportesController@get_z');
Route::get('reporte_bajas_fecha', 'ReportesController@rep_a');
Route::get('reporte_bajas_fecha/getFecha', 'ReportesController@get_a');
Route::get('reporte_animales_parir', 'ReportesController@rep_b');
Route::get('reporte_animales_parir/getFecha', 'ReportesController@get_b');