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
        $tasks = Task::paginate(10);
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
        
        $this->validate($request, [
            'title' => 'required|unique:tasks|max:120',
        ]);

        $task = new task($request->all());
        $task->user_id = Auth::id();

        $task->save();

        $task->tags()->attach($request->tag_list);

        flash('Your new task was created', 'success');

        return redirect()->action('TaskController@index');
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
