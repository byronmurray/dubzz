<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Process;
use App\Task;


class ProcessTaskController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Process $process)
    {
        
        $process->tasks()->attach($request->task_id);

        return back();
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($task, Process $process)
    {
        $process->tasks()->detach($task);

        flash('Your Task has been removed', 'success');

        return back();

    }



}
