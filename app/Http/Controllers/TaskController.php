<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Revision;
use App\Task;
use Session;
use App\Tag;
use Auth;


class TaskController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $tasks = Task::where('status', 'published')->where('deleted', false)->paginate(20);
        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::lists('name', 'id');
        return view('tasks.create', compact('tags'));
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $user = Auth::user();
        /*create new task as a draft*/
        $task = new Task();
        $task->user_id   = $user->id;
        $task->title     = $request->title;
        $task->body      = $request->body;
        
        $task->save();

        /*add the tags to the task*/
        $task->tags()->attach($request->tag_list);

        /*make the revision for the task*/
        $revision = new Revision;
        $revision->task_id  = $task->id;
        $revision->title    = $task->title;
        $revision->body     = $task->body;
        $revision->type     = 'original'; // need to look at this
        
        $user->revisons()->save($revision);

        flash('Your Task has been submitted for approval', 'success');

        return redirect()->route('tasks.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Task $tasks)
    {
        return view('tasks.show', compact('tasks'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $tasks)
    {
        $tags = Tag::lists('name', 'id');
        return view('tasks.edit', compact('tasks', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $tasks)
    {
        
        /*This will run when admin aproves it*/

        //$tasks->update($request->all());
        //$tasks->tags()->sync($request->tag_list);

        //return $tasks;

        

        flash('Your Task title submitted for approval', 'success');

        return back();

        //return redirect()->action('TaskController@show', [$tasks->id]);

    }

}
