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

Route::get('/', 'PagesController@inicio')->name('inicio');

Route::get('/empleados', 'PagesController@empleados')->name('empleados');

Route::post('/', 'PagesController@agregar')->name('empleados.agregar');

Route::get('/editar/{id}', 'PagesController@editar' )->name('empleados.editar');

Route::put('/editar/{id}', 'PagesController@update' )->name('empleados.update');

Route::delete('/eliminar/{id}', 'PagesController@eliminar')->name('empleados.eliminar');

Route::get('/detalle{id}', 'PagesController@detalle')->name('empleados.detalle');

Route::get('/fotos', 'PagesController@fotos')->name('foto');

Route::get('/blog', 'PagesController@blog')->name('blog');



