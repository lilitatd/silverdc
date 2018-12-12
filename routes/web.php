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

Route::resource('planeacions', 'PlaneacionController');
Route::resource('articulos', 'ArticuloController');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

// Rutas para la creacion de labor
Route::get('/labors/create-step1', 'LaborController@createStep1');
Route::post('/labors/create-step1', 'LaborController@postCreateStep1');

Route::get('/labors/create-step2', 'LaborController@createStep2');
Route::post('/labors/create-step2', 'LaborController@postCreateStep2');


// Redirecciones
Route::get('/SuperAdmin', function() {
	echo "Hello SuperAdmin";
})->middleware('auth', 'SuperAdmin');
Route::get('/Admin', function() {
	echo "Hello Admin";
})->middleware('auth', 'Admin');
Route::get('/Seccional', function() {
	echo "Hello Seccional";
})->middleware('auth', 'Seccional');
Route::get('/Supervisor', function() {
	return redirect('planeacions');
})->middleware('auth', 'Supervisor');
Route::get('/Polvorinero', function() {
	echo "Hello Polvorinero";
})->middleware('auth', 'Polvorinero');

Route::get('/test', function() {
	$labor = SilverDC\Labor::findOrFail(1);

	return $labor->planeacion;
	/*$planeacion = SilverDC\Planeacion::findOrFail(1);

	return $planeacion->labors;*/
});