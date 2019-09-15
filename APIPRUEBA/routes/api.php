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


    Route::post('/AgregarUsuario','UsuariosController@store');
    Route::delete('/BorrarUsuario/{id}','UsuariosController@destroy');
    Route::get('/MostrarUsuarios','UsuariosController@show');
    Route::get('/MostrarUsuario/{id}','UsuariosController@showid');
    Route::put('/ActualizarUsuarios/{id}','UsuariosController@edit');

    Route::post('/AgregarViajes','ViajesController@store');
    Route::delete('/BorrarViajes/{id}','ViajesController@destroy');
    Route::get('/MostrarViajes','ViajesController@show');
    Route::put('/ActualizarViajes/{id}','ViajesController@edit');




