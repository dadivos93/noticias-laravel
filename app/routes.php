<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});

// Esto debe estar antes de la ruta a detectar
Route::pattern('nombre','[a-z-A-Z]+');
Route::pattern('edad','[0-9]+');

Route::get('profesores/{nombre}/{edad}', function($nombre, $edad) {
    return "Hola " . $nombre . " tu edad es " . $edad;
});

// Reescribiendo validación
Route::pattern('edad','[0-9-a-z]+');
Route::get('estudiantes/{nombre}/{edad}', function($nombre, $edad) {
    return "Hola " . $nombre . " tu edad es " . $edad;
});

/*Route::get('profesores/{nombre}/{edad}', function($nombre, $edad) {
    return "Hola " . $nombre . " tu edad es " . $edad;
})->where(array('nombre'=>'[a-z-A-Z]+', 'edad'=>'[0-9]+'));*/