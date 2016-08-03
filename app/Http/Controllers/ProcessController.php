<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Task;
use App\Process;
use Auth;

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
        
        $processes = Process::find($id);

        // get an array of tasks currently that belong to the process
        $array = $processes->tasks->lists('id');

        // get all tasks except those in the array
        $taskList = Task::whereNotIn('id', $array)->get();

        //$processes->load('processes');


        

       //return $processes;
       /* if ( $process->processes->isEmpty() ) {
            return redirect()->action('ViewProcessController@show', [$id]);
        }*/
        


        return view('processes.show', compact('processes', 'taskList' ));
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
        $process->user_id = Auth::id();

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
        
        // eager load the relationships
        $processes->load('tasks.steps');

        //return $processes;

        return view('processes.edit', compact('processes'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $process = Process::find($id);

        $process->destroy($id);

        flash('Your Process has been deleted', 'success');

        return back();

        // return back
    }


    

}
