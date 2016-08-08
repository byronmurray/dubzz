@extends('../layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">{{ $processes->title }}

                {{ $process_id = $processes->id }}

                @if ($processes->processes->isEmpty())
                    <button type="button" class="btn btn-primary btn-sm pull-right btn--panel-heading" data-toggle="modal" data-target="#assign-task">
                        Assign Task
                    </button>
                    <button type="button" class="btn btn-primary btn-sm pull-right btn--panel-heading" data-toggle="modal" data-target="#new-task">
                        New Task
                    </button>
                @endif

                @if ($processes->tasks->isEmpty())
                    <button type="button" class="btn btn-primary btn-sm pull-right btn--panel-heading" data-toggle="modal" data-target="#create-process">
                        <span class="glyphicon glyphicon-paste" aria-hidden="true"></span> New Process
                    </button>
                @endif


                {{-- modal for creating a new process --}}
                @include('processes._create_process', ['submit' => 'Create New', 'parent_id' => $processes->id])

                {{-- modal for assign a task to a process --}}
                @include('processes._assign_tasks')

                    
                </div>

                <div class="panel-body">

                <small>Created by {{ $processes->user->name}} on the {{ date_format($processes->created_at,"jS F Y") }} at {{ date_format($processes->created_at,"H:i a") }}</small>

                    @include('flash::message')
                        
                    @if (count($processes->processes))
                      @include('processes._display_processes_tasks', ['var' => $processes->processes ])
                    @endif

                    
                    @if (count($processes->tasks))
                    <h4>Tasks</h4>
                      <ul class="list-group">
                        @foreach ($processes->tasks as $task)
                            <li class="list-group-item">
                              <a href="{{ url('/tasks/'.$task->id)}}">{{ $task->title}}</a>
                              <button type="button" class="btn btn-danger btn-xs pull-right" data-toggle="modal" data-target="#remove-{{ $task->id }}">
                                  <span class="glyphicon glyphicon-paste" aria-hidden="true"></span> Remove Task
                              </button>
                            </li>


                            <div class="modal" id="remove-{{ $task->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
                                    {{ Form::open(['method' => 'DELETE', 'route' => ['tasks.remove', $task->id, $process_id]]) }}
                                      {{ Form::submit('Remove', ['class' => 'btn btn-danger']) }}
                                      {{ Form::submit('Cancel', ['class' => 'btn btn-default', 'data-dismiss' => 'modal' ]) }}
                                    {{ Form::close() }}
                                  </div>
                                </div>
                              </div>
                          </div>

                        @endforeach
                      </ul>
                    @endif 


                </div>
            </div>
        </div>
    </div>

@endsection


