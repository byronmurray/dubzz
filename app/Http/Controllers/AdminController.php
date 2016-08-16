<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Revision;
use App\Task;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        /*update this to just admin*/
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $revisions = Revision::all();

        $revisions->load('user');

        return view('admin.index', compact('revisions'));
    }


    /**
     * Show the application tasks in dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function showTasks()
    {
        $tasks = Task::all();

        return view('admin.tasks' , compact('tasks'));
    }


    /**
     * Show the application tasks in dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function showTasksPending()
    {
        $tasks = Task::all();

        return view('admin.tasksPending' , compact('tasks'));
    }


    /**
     * Show the application tasks in dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function showTasksDeclined()
    {
        $tasks = Task::all();

        return view('admin.tasksDeclined' , compact('tasks'));
    }


    /**
     * Show the application tasks in dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function showTasksDeleted()
    {
        $tasks = Task::all();

        return view('admin.tasksDeleted' , compact('tasks'));
    }
}


