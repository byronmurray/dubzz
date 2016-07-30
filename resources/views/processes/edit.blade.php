@extends('../layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Process</div>

                <div class="panel-body">
                <h1>{{ $processes->title }}</h1>
                <hr>
                @if (count($processes->tasks))
                  @foreach ($processes->tasks as $task)
                      <h2>{{ $task->title}}</h2>

                      @if ($task->steps)
                          <ol>
                            @foreach ($task->steps as $step)
                              <li>
                                <h4>{{ $step->title}}</h4>
                                <p>{!! $step->body !!}</p>
                              </li>
                              <hr>
                            @endforeach
                          </ol>
                      @endif

                  @endforeach
                @endif           

                <hr>
                <hr>

                Would you like to?

                <ul>
                  <li>Assign Tasks</li>
                  <li>Assign A Process</li>
                  <li>Create A New Task</li>
                  <li>Create A New Process</li>
                </ul>

                <h3>Assign A task</h3>
                <form action="{{ url('/processes/'.$processes->id.'/tasks')}}" method="POST">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <div class="form-group">
                     <select class="form-control" multiple="multiple" id="tasks" name="task_id">
                        
                        want to only show the ones available
                         
                       
                        @foreach($taskList as $task)
                            <option value="{{$task->id}}">{{$task->title}}</option>
                        @endforeach
                        


                      </select>
                  </div>

                  <button type="submit" class="btn btn-default">Assign</button>
                </form>
                

                </div>
            </div>
        </div>
    </div>

@endsection