@extends('../layouts.app')

@section('content')

<div class="col-md-10">
    <div class="panel panel-default">
        <div class="panel-heading">Processes
            <a href="{{ route('process.create', [0]) }}"><button type="button" class="btn btn-primary btn-sm pull-right btn--panel-heading">
                <span class="glyphicon glyphicon-paste" aria-hidden="true"></span> New Process
            </button></a>
        </div>

        <div class="panel-body">

                @include('errors._form')

                @include('flash::message')


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
                  @foreach ($processes as $process)

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
                          {{ Form::open(['method' => 'DELETE', 'route' => ['processes.destroy', $process->id]]) }}
                            {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                            {{ Form::submit('Cancel', ['class' => 'btn btn-default', 'data-dismiss' => 'modal' ]) }}
                          {{ Form::close() }}
                        </div>
                      </div>
                    </div>
                </div>




                @endforeach

              </tbody> 
            </table>
 


        {{ $processes->links() }}

        </div>
    </div>
</div>

@endsection