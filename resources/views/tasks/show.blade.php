@extends('../layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">{{ $tasks->title}}
                    <a href="{{ action('StepController@create', [$tasks->id]) }}">
                        <button class="btn btn-primary btn-sm pull-right btn--panel-heading">
                            <span class="glyphicon glyphicon-paste" aria-hidden="true"></span> Add Step
                        </button>
                    </a>
                    
                    <a href="{{ action('TaskController@edit', [$tasks->id]) }}">
                        <button class="btn btn-primary btn-sm pull-right btn--panel-heading">
                            <span class="glyphicon glyphicon-paste" aria-hidden="true"></span> Edit
                        </button>
                    </a>
                </div>

                <div class="panel-body">

                @include('flash::message')

                @include('errors._form')

                @if ($tasks->steps)
                <ol>
                  @foreach ($tasks->steps as $step)
                    <li>
                      <h4>{{ $step->title}}</h4>
                      <p>{!! $step->body !!}</p>
                    </li>
                    <hr>
                  @endforeach
                </ol>
                @endif
                

                </div>
            </div>
        </div>
    </div>

@endsection