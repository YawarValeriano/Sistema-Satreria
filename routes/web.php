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
	$listado=DB::table('orden_trabajo as i')
			->join('cliente as p','i.cliente_ci','=','p.CI')
			->select('i.id_orden_trabajo',DB::raw('CONCAT(p.nombre," ",p.apellidos) as nombre'),'i.cantidad',DB::raw('DATE_FORMAT(i.fecha_entrega, "%d-%m-%Y") as fecha_entrega'),'i.flag_tipo','i.flag_estado','i.detalle')
			->where('i.flag_estado','LIKE',2)
			->groupBy('i.id_orden_trabajo','p.nombre','p.apellidos','i.cantidad','i.fecha_entrega','i.flag_tipo','i.flag_estado','i.detalle')
			->paginate(5);
        return view('welcome',['listado'=>$listado]);
});

Route::group([
    'middleware' => ['auth','isAdmin'],
], function() {
    Route::get('/home', 'HomeController@index')->name('home');
});
Route::group([
    'middleware' => ['auth','isAdmin'],
], function() {
    Route::resource('seguridad','UsuarioController');
});
Route::resource('cliente','ClienteController');
Route::resource('orden','OrdenController');
Route::resource('pendiente','PendienteController');
Route::resource('prueba','PruebaController');
Auth::routes();