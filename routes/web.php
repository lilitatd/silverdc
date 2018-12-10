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
    return view('auth/login');
});

Route::resource('planeacions', 'PlaneacionController');
Route::resource('labors', 'LaborController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


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