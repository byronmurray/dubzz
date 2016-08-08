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

Route::group(['middleware' => ['auth']], function () {
    
    Route::resource('tasks', 'TaskController');
	Route::post('tasks/{task}/steps', 'StepController@store');

	Route::resource('processes', 'ProcessController');
	
	Route::post('processes/{process}/tasks', 'ProcessTaskController@store');

	Route::delete('task/{task}/process/{process}', 'ProcessTaskController@destroy' )->name('tasks.remove');


});


