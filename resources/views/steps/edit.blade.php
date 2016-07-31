@extends('../layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Edit {{ $step->title}}</div>

                <div class="panel-body">

                    @include('errors._form')

                      {!! Form::open(['url' => '']) !!}
                        <div class="form-group">
                            {!! Form::label('title', 'Title:') !!}
                            {!! Form::text('title', $step->title, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('body', 'Body:') !!}
                            {!! Form::textarea('body', $step->body, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::submit('Update', ['class' => 'btn btn-default']) !!}
                        </div>
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>

@endsection