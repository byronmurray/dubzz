<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');




Route::resource('tasks', 'TaskController');
Route::post('tasks/{task}/steps', 'StepController@store');

Route::resource('processes', 'ProcessController');
Route::post('processes/{process}/tasks', 'ProcessTaskController@store');



Route::get('process/{process}', 'ViewProcessController@show');




Route::get('step/create/{task}', 'StepController@create');
Route::get('step/{step}/edit', 'StepController@edit');





Route::get('test', 'TestController@index');