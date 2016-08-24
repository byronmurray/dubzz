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

Route::get('/todo', function () {
    return view('todo');
});

/*LOGIN/LOGOUT/PASSWORD RESET*/
Route::auth();


/*MIDDLEWARE PROTECTED ROUTES*/
Route::group(['middleware' => ['auth']], function () {
    
    /*TASKS*/
    Route::resource('tasks', 'TaskController');

    /*PROCESSES*/
    Route::get('processes/create/{id}', 'ProcessController@create')->name('process.create');
	Route::resource('processes', 'ProcessController');


	/*TAGS*/
	Route::resource('tags', 'TagController');

	
	/*TASK/PROCESS POVIT*/
	Route::post('processes/{process}/tasks', 'ProcessTaskController@store');
	Route::delete('task/{task}/process/{process}', 'ProcessTaskController@destroy' )->name('tasks.remove');
	
	/*REVISIONS*/
	Route::post('revisions', 'RevisionController@create');
	Route::post('revisions/{tasks}', 'RevisionController@store')->name('revision.store');
	Route::patch('revisions/{revisions}', 'RevisionController@update');

	


			/*ADMIN AREA*/ /*this will be in its own group middleware*/
			Route::get('dashboard', 'AdminController@index');

			/*USERS*/
			Route::resource('dashboard/users', 'UserController');

			/*TASKS*/
			Route::get('dashboard/tasks', 'AdminController@showTasks');
			Route::get('dashboard/tasks/pending', 'AdminController@showTasksPending');
			Route::get('dashboard/tasks/deleted', 'AdminController@showTasksDeleted');
			Route::get('dashboard/tasks/declined', 'AdminController@showTasksDeclined');

			/*TASK REVISIONS*/
			Route::get('dashboard/tasks/{tasks}/revisions', 'RevisionController@showTasksRevisions')->name('tasks.revisions');
			Route::get('dashboard/revisions/{revisions}', 'RevisionController@show')->name('revision.show');

});


