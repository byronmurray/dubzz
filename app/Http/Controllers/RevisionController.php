<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\HtmlDiff;
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
        
        //return $revisions;

        $task = Task::find($revisions->task_id);



        $revisionBody = $revisions->body;
        $taskBody = $task->body;
        $diff = new HtmlDiff(  $taskBody, $revisionBody );
        $diff->build();

        $getRevisionBody = $diff->getOldHtml();

        $getTaskBody = $diff->getNewHtml();

        $getDifference = $diff->getDifference();


        return view('admin.taskRevision', compact('revisions', 'task', 'getRevisionBody', 'getTaskBody', 'getDifference' ));
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

        // need to sync tags here
        /*need to do a check here first*/
        if ($request->tag_list) {
            $tasks->tags()->sync($request->tag_list);
        }
        

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

        /*need to find any other revisions with a status of active and set to version for the task-revision*/

        $revisions->update($request->all());
        

        /*Update the Task*/
        if ($request->approved) {
            $task = Task::find($revisions->task_id);
            $task->update([
                    $task->title    = $revisions->title,
                    $task->body     = $revisions->body,
                    $task->status   = 'published'
            ]);


        }


        flash('Your new task has been updated', 'success');

        return redirect()->action('AdminController@showTasks');
        
    }

}
