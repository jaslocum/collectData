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

Event::listen('illuminate.query', function($query)
{
    //var_dump($query);
});

Route::get('/', 'HomeController@showWelcome');

Route::resource('amps', 'AmpController');

Route::resource('volts', 'VoltController');

Route::resource('temperatures', 'TemperatureController');

Route::resource('records', 'RecordController');

Route::resource('recordTypes', 'RecordTypeController');

Route::resource('loggers', 'LoggerController');

Route::resource('loggerTypes', 'LoggerTypeController');

Route::resource('units', 'UnitController');
