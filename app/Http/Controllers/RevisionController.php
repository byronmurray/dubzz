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
        return view('admin.taskRevision', compact('revisions'));
    }


    /**
     * Display all revisions for the task.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showTasksRevisions(Task $tasks)
    {
        $revisions = Revision::where('task_id', $tasks->id)->get();
        //return $revisions;
        return view('admin.tasksRevisions', compact('revisions'));
    }


    /**
     * Display single revision for the task.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showTasksRevision(Revision $revisions)
    {
        return view('admin.tasksRevisions', compact('revisions'));
    }


    /**
     * Create a new pending task for the specified resoure.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $tasks
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        
        $user = Auth::user();

        $revision = new Revision;
        $revision->task_id  = 0;
        $revision->title    = $request->title;
        $revision->body     = $request->body;
        $revision->type     = 'original';
        $user->revisons()->save($revision);

        flash('Your Task title submitted for approval', 'success');

        return back();

    }


    /**
     * Store a edit to a current task.
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

        /*Update the revision*/
        $revisions->update($request->all());

        /*Update the Task*/
        if ($request->approved && $request->type == 'edit') {
            $task = Task::find($revisions->task_id);

            $task->update([
                    $task->title    = $revisions->title,
                    $task->body     = $revisions->body
            ]);
        }

        /*Create the Task*/
        if ($request->approved && $request->type == 'original') {

            //return $revisions;

            $task = new task();
            $task->user_id = Auth::id();
            $task->title = $revisions->title;
            $task->body = $revisions->body;

            $task->save();

            //$task->tags()->attach($request->tag_list);

            flash('Your new task was created', 'success');

            return redirect()->action('AdminController@showTasks');
        } 

        return back();
        
    }

}
