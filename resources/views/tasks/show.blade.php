@extends('../layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Task</div>

                <div class="panel-body">
                <h1>{{ $tasks->title }}</h1>
                <a class="pull-right" href="{{ url('/tasks/'.$tasks->id.'/edit') }}">Edit title</a>
                <hr>

                <button class="btn btn-default" id="clicky">Add A Step</button>

                @include('errors._form')

                {!! Form::open(['url' => 'tasks/'.$tasks->id.'/steps', 'id' => 'toggleForm']) !!}
                    <div class="form-group">
                        {!! Form::label('title', 'Title:') !!}
                        {!! Form::text('title', old('title'), ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('body', 'Body:') !!}
                        {!! Form::textarea('body', old('title'), ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::submit('Submit', ['class' => 'btn btn-default']) !!}
                    </div>
                {!! Form::close() !!}  



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