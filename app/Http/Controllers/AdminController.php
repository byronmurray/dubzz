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
        
        $revisions = Revision::where('approved', true)->get();

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
        $revisions = Revision::where('seen', false)->get();

        return view('admin.tasksPending' , compact('revisions'));
    }


    /**
     * Show the application tasks in dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function showTasksDeclined()
    {
        $revisions = Revision::where('seen', false)->where('approved', false)->get();

        return view('admin.tasksDeclined' , compact('revisions'));
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

