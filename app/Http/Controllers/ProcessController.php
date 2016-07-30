<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Task;
use App\Process;

class ProcessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $processes = Process::where('process_id', 0)->get();

        $processes->load('processes');

        return view('processes.index', compact('processes'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $process = Process::find($id);

        $process->load('processes');

       // return $process;
        if ( $process->processes->isEmpty() ) {
            return redirect()->action('ViewProcessController@show', [$id]);
        }
        


        return view('processes.show', compact('process'));
    }



    /**
     * Display the page to create a process.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$array = $processes->tasks->lists('id');

        $processes = Process::all();

        $processes->load('tasks');

        //return $process;

        return view('processes.create', compact('processes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|unique:processes|max:120',
        ]);

        //return $request->process_id;

        $process = new Process($request->all());

        $process->save();

        flash('Your Process has been created', 'success');

        return back();
    }

    /**
     * Edit the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Process $processes)
    {
        
        // get an array of tasks currently that belong to the process
        $array = $processes->tasks->lists('id');

        // get all tasks except those in the array
        $taskList = Task::whereNotIn('id', $array)->get();

        // eager load the relationships
        $processes->load('tasks.steps');

        //return $processes;

        return view('processes.edit', compact('processes', 'taskList'));
    }


    

}
