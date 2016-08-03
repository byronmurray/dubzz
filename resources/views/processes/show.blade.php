@extends('../layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">{{ $processes->title }}

                @if ($processes->processes->isEmpty())
                    <button type="button" class="btn btn-primary btn-sm pull-right btn--panel-heading" data-toggle="modal" data-target="#assign-task">
                        Assign Task
                    </button>
                @endif

                @if ($processes->tasks->isEmpty())
                    <button type="button" class="btn btn-primary btn-sm pull-right btn--panel-heading" data-toggle="modal" data-target="#create-process">
                        <span class="glyphicon glyphicon-paste" aria-hidden="true"></span> New Process
                    </button>
                @endif

                {{-- modal for creating a new process --}}
                <div class="modal" id="create-process" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title" id="myModalLabel">The Title</h4>
                        </div>
                        <div class="modal-body">
                            
                        <form action="{{ url('/processes/')}}" method="POST">
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                            <input type="hidden" name="process_id" value="{{ $processes->id }}">
                          </div>
                          
                        </div>
                        <div class="modal-footer">
                          <button type="submit" class="btn btn-primary">Submit</button>
                          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        </form>
                        </div>
                      </div>
                    </div>
                </div>
                  


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
                          <div class="form-group">
                             <select class="form-control" multiple="multiple" id="tasks" name="task_id">
                                
                                {{-- want to only show the ones available --}}
                               
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
                        
                    @if ($processes->tasks->isEmpty())
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
                        @foreach ($processes->processes as $process) {{-- this is the only difference  --}}


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
                            <a href="" title="edit process">
                                <button class="btn btn-primary btn-xs">
                                    <span class="glyphicon glyphicon-edit"  aria-hidden="true"></span>
                                </button>
                              </a>
                          </td>
                          <td>
                            <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#myModal-{{ $process->id }}">
                                <span class="glyphicon glyphicon-trash" title="delete process"></span>
                            </button>
                          </td>
                        </tr> 
                          
                            <div class="modal" id="myModal-{{ $process->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                      <h4 class="modal-title" id="myModalLabel">{{$process->title}}</h4>
                                    </div>
                                    <div class="modal-body">
                                        <p class="danger"><strong>Warning</strong> deleting this process will also delete any sub processes attached to this process</p>
                                      <p>Are you sure you want to delete <strong>{{ $process->title }}</strong>?</p>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                      {{ Form::open(['method' => 'DELETE', 'route' => ['processes.destroy', $process->id]]) }}
                                        {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                                      {{ Form::close() }}
                                    </div>
                                  </div>
                                </div>
                            </div>

                        @endforeach

                        </tbody> 
                      </table>
                      @endif
                    
                    {{-- if a process has tasks --}}


                    @if (count($processes->tasks))
                    <h4>Tasks</h4>
                      <ul class="list-group">
                        @foreach ($processes->tasks as $task)
                            <li class="list-group-item"><a href="{{ url('/tasks/'.$task->id)}}">{{ $task->title}}</a></li>
                        @endforeach
                      </ul>
                    @endif 


                </div>
            </div>
        </div>
    </div>

@endsection


