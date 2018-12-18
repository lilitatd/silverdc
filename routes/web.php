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
Route::resource('planeacions', 'PlaneacionController')->middleware('auth');
Route::get('/planeacions/{id}/revision', 'PlaneacionController@revision')->middleware('auth', 'Supervisor');
Route::get('/planeacions/{id}/revision2', 'PlaneacionController@revision2')->middleware('auth', 'Supervisor');
Route::get('/planeacions/{id}/boleta', 'PlaneacionController@boleta')->middleware('auth', 'Supervisor');

/*
 * -------------------------
 * 		Boletas
 * -------------------------
 */
//Route::resource('boletas', 'BoletaController');
Route::get('/boletas', 'BoletaController@index')->name('bolsearch');
Route::get('/boletas/step1', 'BoletaController@createStep1');
Route::post('/boletas/create/{id}', 'BoletaController@createAll');
Route::get('/boletas/{id}', 'BoletaController@show')->middleware('auth', 'Polvorinero');
Route::post('/boletas', 'BoletaController@update')->name('bolsave');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

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
	echo "Hello SuperAdmin";
})->middleware('auth', 'SuperAdmin');
Route::get('/Admin', function() {
	echo "Hello Admin";
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