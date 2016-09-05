@extends('../layouts.app')

@section('content')

<div class="col-md-10">
    <div class="panel panel-default">
        <div class="panel-heading">{{ $processes->title }}

        @if ($processes->processes->isEmpty())
            <button type="button" class="btn btn-primary btn-sm pull-right btn--panel-heading" data-toggle="modal" data-target="#assign-task">
                Assign Task
            </button>
            <button >
                New Task
            </button>
        @endif

        @if ($processes->tasks->isEmpty())
            <a href="{{ route('process.create', [$processes->id]) }}"><button type="button" class="btn btn-primary btn-sm pull-right btn--panel-heading">
                <span class="glyphicon glyphicon-paste" aria-hidden="true"></span> New Process
            </button></a>
        @endif


        {{-- modal for assign a task to a process --}}
        <div class="modal" id="assign-task" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">{{ $processes->title}}</h4>
              </div>
              <div class="modal-body">
                                              
              <form action="{{ url('/processes/'.$processes->id.'/tasks')}}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="process_id" value="{{ $processes->id }}">
                <div class="form-group">
                   <select class="form-control" multiple="multiple" id="tasks" name="task_id[]">
                      
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

            
        </div>

        <div class="panel-body">

        <small>Created by {{ $processes->user->name}} on the {{ date_format($processes->created_at,"jS F Y") }} at {{ date_format($processes->created_at,"H:i a") }}</small>

            @include('flash::message')
                
            @if (count($processes->processes))
              <table class="table table-striped">
                <thead>
                  <tr>  
                    <th>Title</th> 
                    <th width="5%">Processes</th> 
                    <th width="5%">Tasks</th>
                    <th width="5%">View</th>
                    <th width="5%">Edit</th>
                    <th width="5%">Delete</th>
                  </tr> 
                </thead>
                <tbody>
                @foreach ($processes->processes as $process)


                <tr>
                  <td>{{ $process->title}}</td>
                  <td class="text-center">
                      @if (count($process->processes))
                          {{ count($process->processes)}}
                      @endif
                  </td> 
                  <td class="text-center">
                    @if (count($process->tasks)) 
                        {{ count($process->tasks) }}
                    @endif
                  </td>
                  <td>
                    <a href="{{ url('/processes/'.$process->id)}}" title="view process">
                        <button class="btn btn-primary btn-xs">
                            <span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span>
                        </button>
                      </a>
                  </td>
                  <td>
                    <a href="{{ url('/processes/'.$process->id.'/edit')}}">Edit</a>
                  </td>
                  <td>
                    <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#myModal-{{ $process->id }}">
                        <span class="glyphicon glyphicon-trash" title="delete process"></span>
                    </button>
                  </td>
                </tr> 
                  






                @endforeach

                </tbody> 
              </table>





 
            @endif

            
            @if (count($processes->tasks))
            <h4>Tasks</h4>
              <ul class="list-group">
                @foreach ($processes->tasks as $task)
                    <li class="list-group-item">
                      <a href="{{ url('/tasks/'.$task->id)}}">{{ $task->title}}</a>
                      <button type="button" class="btn btn-default btn-xs pull-right" data-toggle="modal" data-target="#remove-{{ $task->id }}">
                          <span class="glyphicon glyphicon-paste" aria-hidden="true"></span> Remove Task
                      </button>
                    </li>


                    {{-- <div class="modal" id="remove-{{ $task->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">{{$task->title}}</h4>
                          </div>
                          <div class="modal-body">
                              <p class="danger"><strong>Note:</strong> Removing this task will only remove it from this process. If you wish to delete the task completely delete it from Tasks</p>
                            <p>Are you sure you want to Remove <strong>{{ $task->title }}</strong>?</p>

                          </div>
                          <div class="modal-footer">
                            {{ Form::open(['method' => 'DELETE', 'route' => ['tasks.remove', $task->id, $processes->id]]) }}
                              {{ Form::submit('Remove', ['class' => 'btn btn-danger']) }}
                              {{ Form::submit('Cancel', ['class' => 'btn btn-default', 'data-dismiss' => 'modal' ]) }}
                            {{ Form::close() }}
                          </div>
                        </div>
                      </div>
                  </div> --}}

                @endforeach
              </ul>
            @endif 


        </div>
    </div>
</div>

@endsection


