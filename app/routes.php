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

//Parcelas
Route::post('parcelas/action', 'ParcelasController@action');
Route::post('parcelas/editar','ParcelasController@getEditar');
Route::get('parcelas/get','ParcelasController@getParcelas');
Route::controller('parcelas','ParcelasController');

//Razas
Route::post('razas/action', 'RazasController@action');
Route::post('razas/editar','RazasController@getEditar');
Route::get('razas/get','RazasController@getRazas');
Route::controller('razas','RazasController');

//Lotes
Route::post('lotes/action', 'LotesController@action');
Route::post('lotes/editar','LotesController@getEditar');
Route::get('lotes/get','LotesController@getLotes');
Route::get('lotes/getParcela','LotesController@getParcela');
Route::controller('lotes','LotesController');

//Producciones
Route::post('producciones/action', 'ProduccionsController@action');
Route::post('producciones/editar','ProduccionsController@getEditar');
Route::get('producciones/getProduccion','ProduccionsController@getProduccions');
Route::get('producciones/getParcela','ProduccionsController@getParcela');
Route::get('producciones/getLote','ProduccionsController@getLote');
Route::get('producciones/getAnimal','ProduccionsController@getAnimal');
Route::controller('producciones','ProduccionsController');

//Tipo Servicios
Route::post('tipo_servicios/action', 'TiposerviciosController@action');
Route::post('tipo_servicios/editar','TiposerviciosController@getEditar');
Route::get('tipo_servicios/getTiposervicio','TiposerviciosController@getTiposervicios');
Route::controller('tipo_servicios','TiposerviciosController');

//CAtegorias
Route::post('categorias/action', 'CategoriasController@action');
Route::post('categorias/editar','CategoriasController@getEditar');
Route::get('categorias/getCategoria','CategoriasController@getCategorias');
Route::controller('categorias','CategoriasController');

//Especies
Route::post('especies/action', 'EspeciesController@action');
Route::post('especies/editar','EspeciesController@getEditar');
Route::get('especies/getEspecie','EspeciesController@getEspecies');
Route::controller('especies','EspeciesController');

//Etapas
Route::post('etapas/action', 'EtapasController@action');
Route::post('etapas/editar','EtapasController@getEditar');
Route::get('etapas/getEtapa','EtapasController@getEtapas');
Route::controller('etapas','EtapasController');

//Estados
Route::post('estados/action', 'EstadosController@action');
Route::post('estados/editar','EstadosController@getEditar');
Route::get('estados/getEstado','EstadosController@getEstados');
Route::get('estados/getParcela','ProduccionsController@getParcela');
Route::get('estados/getLote','ProduccionsController@getLote');
Route::get('estados/getAnimal','ProduccionsController@getAnimal');
Route::controller('estados','EstadosController');

//Nacimientos
Route::post('entradas/action', 'EntradasController@action');
Route::post('entradas/editar','EntradasController@getEditar');
Route::get('entradas/getEntradas','EntradasController@getEntradas');
Route::get('entradas/getProveedor','EntradasController@getProveedor');
Route::get('entradas/getRaza','EntradasController@getRaza');
Route::controller('entradas','EntradasController');

//Servicios
Route::post('servicios/action', 'ServiciosController@action');
Route::post('servicios/editar','ServiciosController@getEditar');
Route::get('servicios/getServicio','ServiciosController@getServicios');
Route::get('servicios/getTiposervicio','ServiciosController@getTiposervicios');
Route::controller('servicios','ServiciosController');

//Bajas
Route::post('salidas/action', 'SalidasController@action');
Route::post('salidas/editar','SalidasController@getEditar');
Route::get('salidas/getSalida','SalidasController@getSalidas');
Route::get('salidas/getGanado','SalidasController@getGanado');
Route::controller('salidas','SalidasController');

//Enfermedades
Route::post('proveedor/action', 'ProveedorController@action');
Route::post('proveedor/editar','ProveedorController@getEditar');
Route::get('proveedor/getProveedor','ProveedorController@getProveedor');
Route::controller('proveedor','ProveedorController');

//Control Materno
Route::post('lactancias/action', 'LactanciasController@action');
Route::post('lactancias/editar','LactanciasController@getEditar');
Route::get('lactancias/getLactancia','LactanciasController@getLactancias');
Route::get('lactancias/getParcela','ProduccionsController@getParcela');
Route::get('lactancias/getLote','ProduccionsController@getLote');
Route::get('lactancias/getAnimal','ProduccionsController@getAnimal');
Route::controller('lactancias','LactanciasController');

//Reportes
Route::get('reporte_lista_animales', 'ReportesController@rep_x');
Route::get('reporte_listado_produccion', 'ReportesController@rep_y');
Route::get('reporte_nacimientos_fecha', 'ReportesController@rep_z');
Route::get('reporte_nacimientos_fecha/getFecha', 'ReportesController@get_z');
Route::get('reporte_bajas_fecha', 'ReportesController@rep_a');
Route::get('reporte_bajas_fecha/getFecha', 'ReportesController@get_a');
Route::get('reporte_animales_parir', 'ReportesController@rep_b');
Route::get('reporte_animales_parir/getFecha', 'ReportesController@get_b');