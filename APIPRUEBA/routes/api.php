<?php
use Illuminate\Http\Request;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

    //Ruta para agregar usuarios al modelo
    Route::post('/AgregarUsuario','UsuariosController@store');
    //Ruta para Borrar usuarios del modelo segun una id
    Route::delete('/BorrarUsuario/{id}','UsuariosController@destroy');
    //Ruta para PAGINAR USUARIOS DEL MODELO (html)
    Route::get('/PaginadoUsuarios','UsuariosController@index');
    //Ruta para paginar usuarios del modelo (json)
    Route::get('/MostrarUsuarios','UsuariosController@show');
    //Ruta para paginar usuarios del modelo segun una id
    Route::get('/MostrarUsuario/{id}','UsuariosController@showid');
    //Ruta para actualizar usuarios del modelo segun una id
    Route::put('/ActualizarUsuarios/{id}','UsuariosController@edit');

    //Ruta para agregar viajes (con variable xml)
    Route::post('/AgregarViajes1','ViajesController@store1');
    //Ruta para agregar viajes al modelo
    Route::post('/AgregarViajes','ViajesController@store');
    //Ruta para borrar viajes segun una id
    Route::delete('/BorrarViajes/{id}','ViajesController@destroy');
    //Ruta para paginar viajes del modelo (html)
    Route::get('/PaginadoViajes','ViajesController@index');
    //Ruta para paginar viajes del modelo (returna json)
    Route::get('/MostrarViajes','ViajesController@show');
    //Ruta para actualizar viajes del modelo segun una id
    Route::put('/ActualizarViajes/{id}','ViajesController@edit');




