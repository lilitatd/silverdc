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
	echo "Hello Supervisor";
})->middleware('auth', 'Supervisor');
Route::get('/Polvorinero', function() {
	echo "Hello Polvorinero";
})->middleware('auth', 'Polvorinero');