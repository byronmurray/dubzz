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

/*HOME PAGE*/
Route::get('/', function () {
    return view('welcome');
});

/*LOGIN/LOGOUT/PASSWORD RESET*/
Route::auth();


/*MIDDLEWARE PROTECTED ROUTES*/
Route::group(['middleware' => ['auth']], function () {
    
    /*TASKS*/
    Route::resource('tasks', 'TaskController');

    /*PROCESSES*/
	Route::resource('processes', 'ProcessController');
	
	/*TASK/PROCESS POVIT*/
	Route::post('processes/{process}/tasks', 'ProcessTaskController@store');
	Route::delete('task/{task}/process/{process}', 'ProcessTaskController@destroy' )->name('tasks.remove');
	
	/*REVISIONS*/
	Route::post('revisions/{tasks}', 'RevisionController@store');
	Route::get('revisions/{revisions}', 'RevisionController@show')->name('revision.show');
	Route::patch('revisions/{revisions}', 'RevisionController@update');

	/*TASK REVISIONS*/
	Route::get('tasks/{tasks}/revisions', 'RevisionController@revisions');


	/*ADMIN AREA*/
	Route::get('dashboard', 'AdminController@index');
	Route::get('dashboard/tasks', 'AdminController@showTasks');
	Route::get('dashboard/tasks/pending', 'AdminController@showTasksPending');

	Route::get('dashboard/tasks/deleted', 'AdminController@showTasksDeleted');
	Route::get('dashboard/tasks/declined', 'AdminController@showTasksDeclined');

});


