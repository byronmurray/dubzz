<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Process;
use App\Task;

class TaskProcessesController extends Controller
{
    /**
     * Show all processes belowing to the task in dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Task $tasks)
    {
        $tasks = Task::where('id', $tasks->id)->first();

       	$processes = $tasks->processes;

        return view('admin.taskProcesses' , compact('processes', 'tasks'));
    }
}
