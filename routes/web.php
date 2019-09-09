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

Route::get('/', function(){
    return view('welcome');
});

Route::get('/editar/{id}', 'EmpleadosController@edit')->name('empleados.editar');

Route::put('/editar/{id}', 'EmpleadosController@update');

Route::delete('/eliminar/{id}', 'Empleados@destroy');


Route::get('/fotos', function(){
    return view('fotos');
});

Route::get('/blog', function(){
    return view('blog');
});


Auth::routes();

Route::resource('/empleados', 'EmpleadosController');

Route::get('/home', 'HomeController@index')->name('home');
