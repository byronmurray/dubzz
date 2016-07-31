@extends('../layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Processes
                    <a href="{{ action('ProcessController@create') }}">
                        <button class="btn btn-primary btn-sm pull-right btn--panel-heading">
                            <span class="glyphicon glyphicon-paste" aria-hidden="true"></span> New Process
                        </button>
                    </a>
                </div>

                <div class="panel-body">

                @include('flash::message')

                    {{-- show errors --}}
                    @if ($processes->isEmpty())
                        <div class="alert alert-info" role="alert">
                          <p>You dont have any Process, please start by creating a New Process</p>
                        </div>
                    @endif

                    <ul class="list-group">
                        @foreach ($processes as $process)
                            <li class="list-group-item"><span>{{ $process->title}} <span class="badge">{{ count($process->processes)}}</span></span>
                                {{-- CRUD buttons --}}
                                <div class="pull-right">
                                    <a href="{{ url('/processes/'.$process->id)}}" title="view process">
                                        <button class="btn btn-primary btn-xs">
                                            <span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span>
                                        </button>
                                    </a> 
                                    <a href="" title="edit process">
                                        <button class="btn btn-primary btn-xs">
                                            <span class="glyphicon glyphicon-edit"  aria-hidden="true"></span>
                                        </button>
                                    </a> 

                                    <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#myModal-{{ $process->id }}">
                                        <span class="glyphicon glyphicon-trash" title="delete process"></span>
                                    </button>


                                </div>
                            </li>



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
                    </ul>

                    <div class="clearfix"></div>


                </div>
            </div>
        </div>
    </div>


@endsection