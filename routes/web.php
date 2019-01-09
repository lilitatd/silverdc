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

/*Route::filter('auth', function() {
	if (Auth::guest()) {
		return Redirect::guest('login');
	}
});*/

Route::get('/', function () {
	if (Auth::check()) {
		return redirect('/'.Auth::user()->role);
	}
    return view('auth/login');
});

/*
 * -------------------------
 * 		Artículos
 * -------------------------
 */
Route::resource('articulos', 'ArticuloController');

/*
 * -------------------------
 * 		Planeaciones
 * -------------------------
 */
Route::resource('planeacions', 'PlaneacionController')->middleware('Supervisor');
Route::get('/planeacions/{id}/revision', 'PlaneacionController@revision')->middleware('auth', 'Supervisor');
Route::get('/planeacions/{id}/revision2', 'PlaneacionController@revision2')->middleware('auth', 'Supervisor');
Route::get('/planeacions/{id}/boleta', 'PlaneacionController@boleta')->middleware('auth', 'Supervisor');

/*
 * -------------------------
 * 		Boletas
 * -------------------------
 */
Route::resource('boletas', 'BoletaController');
Route::get('/boletas', 'BoletaController@index')->name('bolsearch');
Route::get('/boletas/step1', 'BoletaController@createStep1');
Route::post('/boletas/create/{id}', 'BoletaController@createAll');
Route::post('/pol/boletas', 'BoletaController@update')->name('bolsave');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

/*
 * -------------------------
 * 		Usuarios
 * -------------------------
 */
Route::resource('users', 'UserController');
/*Route::get('/users', 'UserController@index')->middleware('auth', 'SuperAdmin')->name('users.index');
Route::delete('/users/{id}', 'UserController@destroy')->name('users.destroy');
Route::get('/users/create', 'UserController@create');
Route::post('/users/create', 'UserController@store')->name('users.store');
Route::get('/users/{id}/edit', 'UserController@show');
Route::put('/users/{id}/edit', 'UserController@update')->name('users.update');*/

/*
 * -------------------------
 * 		Reporte
 * -------------------------
 */
Route::get('/reporte', 'ReporteController@index')->name('repsearch');

// Rutas para la creacion de labor
Route::get('labors/create-step1/{planeacion_id}', [
    'as' => 'createlabors',
    'uses' => 'LaborController@createStep1',
]);
//Route::get('/labors/create-step1', 'LaborController@createStep1');
Route::post('/labors/create-step1', 'LaborController@postCreateStep1');

Route::get('/labors/create-step2', 'LaborController@createStep2');
Route::post('/labors/create-step2', 'LaborController@postCreateStep2');
Route::post('/labors/delete', 'LaborController@destroy');

// Redirecciones
Route::get('/SuperAdmin', function() {
	return redirect('/users');
})->middleware('auth', 'SuperAdmin');
Route::get('/Admin', function() {
	return redirect('/users');
})->middleware('auth', 'Admin');
Route::get('/Seccional', 'SeccionalController@index')->middleware('auth', 'Seccional');
Route::get('/seccional/{id}', 'SeccionalController@show')->middleware('auth', 'Seccional');
Route::get('/seccional/{id}/aprobar', 'SeccionalController@aprobar')->middleware('auth', 'Seccional');
Route::get('/Supervisor', function() {
	return redirect('planeacions');
})->middleware('auth', 'Supervisor');

// Polvorinero
Route::get('/Polvorinero', 'BoletaController@index')->middleware('auth', 'Polvorinero');

Route::get('/test', function() {
	$labor = SilverDC\Labor::findOrFail(1);

	return $labor->planeacion;
	/*$planeacion = SilverDC\Planeacion::findOrFail(1);

	return $planeacion->labors;*/
});