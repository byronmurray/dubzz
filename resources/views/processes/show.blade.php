@extends('../layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">{{ $process->title }}</div>

                <div class="panel-body">
                        
                    <ul class="list-group">
                    @foreach ($process->processes as $process)
                        <li class="list-group-item"><span >{{$process->title}}</span>
                            <div class="pull-right">
                                <a href="{{ url('/processes/'.$process->id)}}" title="view process">
                                    <button class="btn btn-primary btn-xs">
                                        <span class="glyphicon glyphicon-folder-open"  aria-hidden="true"></span>
                                    </button>
                                </a>
                                <a href="" title="edit process">
                                    <button class="btn btn-primary btn-xs">
                                        <span class="glyphicon glyphicon-edit"  aria-hidden="true"></span>
                                    </button>
                                </a> 
                                <a href="" title="delete process">
                                    <button class="btn btn-danger btn-xs">
                                        <span class="glyphicon glyphicon-trash" title="delete process" aria-hidden="true"></span>
                                    </button>
                                </a>
                            </div>
                        </li>
                    @endforeach
                    </ul>

                </div>
            </div>
        </div>
    </div>

@endsection


