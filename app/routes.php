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

// Creando un grupo de rutas dode se le aplica un filtro de sessión antes de acceder
Route::group(array('before'=>'session'), function() {
    Route::get('profesores/{nombre}/{edad}', function($nombre, $edad) {
        return "Hola {$nombre} tu edad es {$edad}";
    });

    // Reescribiendo validación
    Route::pattern('edad','[0-9-a-z]+');
    Route::get('estudiantes/{nombre}/{edad}', function($nombre, $edad) {
        return "Hola " . $nombre . " tu edad es " . $edad;
    });
});


// Validando la sesion antes de entrar en la ruta
/*Route::pattern('edad','[0-9-a-z]+');
Route::get('estudiantes/{nombre}/{edad}', array('before'=>'session' ,function($nombre, $edad) {
    return "Hola " . $nombre . " tu edad es " . $edad;
}));*/

/*Route::get('profesores/{nombre}/{edad}', function($nombre, $edad) {
    return "Hola " . $nombre . " tu edad es " . $edad;
})->where(array('nombre'=>'[a-z-A-Z]+', 'edad'=>'[0-9]+'));*/

// Crear una variable de sesion
Route::get('session/crear', function() {
    Session::put('nombre', 'David');
    return 'Se creó la sesión correctamente';
});

// 
Route::get('/session/eliminar', function() {
    Session::forget('nombre');
    return 'El campo nombre fue eliminado de la sesion actual';
});