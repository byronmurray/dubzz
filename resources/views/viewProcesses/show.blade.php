@extends('../layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">{{ $process->title }}
                  <a href="{{ action('ProcessController@edit', [$process->id]) }}">
                    <button class="btn btn-primary btn-xs pull-right">Edit &nbsp;
                      <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </button>
                  </a>
                </div>

                <div class="panel-body">

                @if (count($process->tasks))
                  @foreach ($process->tasks as $task)
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
                

                </div>
            </div>
        </div>
    </div>

@endsection