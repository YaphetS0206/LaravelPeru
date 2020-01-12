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


//AQUI SON LAS RUTAS PARA CONFIGURAR LOS SLASH Y CARPETAS 
//PARA PODER HACER FUNCIONALIDADES DE RETORNACION
//HASTA INCLUSO FUNCIONALIDADES DEL CONTROLADOR


Route::get('/', 'PagesController@inicio')->name('inicio');

Route::get('/detalle/{id}', 'PagesController@detalle')->name('detalle');

Route::post('/', 'PagesController@crear')->name('notas.crear');

Route::put('/editar/{id}', 'PagesController@actualizar')->name('actualizar');

Route::delete('eliminar/{id}', 'PagesController@eliminar')->name('notas.eliminar');

Route::get('/editar/{id}', 'PagesController@editar')->name('notas.editar');

Route::get('fotos', 'PagesController@fotos')->name('foto');

Route::get('blog', 'PagesController@blog')->name('noticias');

Route::get('nosotros/{nombre?}','PagesController@nosotros')->name('nosotros');