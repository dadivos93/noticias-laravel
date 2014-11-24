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

Route::get('usuarios', function()
{
    return "Hola Mundo";
});

Route::post('usuarios', function()
{
    return View::make('hello');
});

Route::get('usuario/{nombre?}/{edad?}', function($nombre=null, $edad=null)
{
    if(!$nombre) {
        return "Hola Mundo";
    } else {
        return "Hola " . $nombre . " tu edad es " . $edad;
    }
});

Route::match(array('GET', 'POST'), '/', function()
{
    return 'Hello World';
});

Route::any('foo', function()
{
    return 'Hello World';
});

Route::get('foo', array('https', function()
{
    return 'Must be over HTTPS';
}));