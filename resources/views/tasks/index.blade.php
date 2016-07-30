@extends('../layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Tasks</div>

                <div class="panel-body">
                    @foreach ($tasks as $task)
                        <li><a href="{{ url('/tasks/'.$task->id)}}">{{ $task->title}} </a></li>
                    @endforeach

                <h2>Add A Task</h2>

                @include('errors._form')

                {!! Form::open(['url' => 'tasks']) !!}
                    <div class="form-group">
                        {!! Form::label('title', 'Title:') !!}
                        {!! Form::text('title', null, ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::submit('Submit', ['class' => 'btn btn-default']) !!}
                    </div>
                {!! Form::close() !!}
               

                </div>
            </div>
        </div>
    </div>

@endsection