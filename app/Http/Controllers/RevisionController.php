<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Revision;
use App\Task;
use Auth;

class RevisionController extends Controller
{
    
	
    /**
     * Show the specified resource in storage.
     *
     * @param  \App\Revision  $revisions
     * @return \Illuminate\Http\Response
     */
    public function show(Revision $revisions)
    {
        return view('tasks.revisions.show', compact('revisions'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function revisions(Task $tasks)
    {
        $revisions = Revision::where('task_id', $tasks->id)->get();
        //return $revisions;
        return view('tasks.showRevisions', compact('tasks', 'revisions'));
    }



    /**
     * Store the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $tasks
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Task $tasks)
    {
        
        $user = Auth::user();

        $revision = new Revision;
        $revision->task_id  = $tasks->id;
        $revision->title    = $request->title;
        $revision->body     = $request->body;
        $user->revisons()->save($revision);

        flash('Your Task title submitted for approval', 'success');

        return back();

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $tasks
     * @param  \App\Revision  $revisions
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Revision $revisions)
    {
        
        //return $revisions;
        /*This will update the revision depending on what the admin clicks*/

        $revisions->update($request->all());



        if ($request->approved) {
            $task = Task::find($revisions->task_id);

            $task->update([
                    $task->title    = $revisions->title,
                    $task->body     = $revisions->body
            ]);
        } 

       
        return back();
        
        

    }




}
