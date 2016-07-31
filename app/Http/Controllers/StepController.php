<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Task;
use App\Step;

class StepController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Task $task)
    {
        
        $this->validate($request, [
            'title' => 'required|unique:steps|max:120',
            'body'  => 'required',
        ]);

        $step = new Step($request->all());

        $task->steps()->save($step);

        flash('Your new step was created', 'success');

        return redirect()->action('TaskController@show', [$task->id]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Task $task)
    {
        
        return view('steps.create', compact('task'));
    }


    /**
     * Edit the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Step $step)
    {
        
        return view('steps.edit', compact('step'));
    }


}
