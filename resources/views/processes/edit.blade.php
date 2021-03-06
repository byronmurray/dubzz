@extends('../layouts.app')

@section('content')

<div class="col-md-10">
    <div class="panel panel-default">
        <div class="panel-heading">Edit {{ $processes->title}}</div>

        <div class="panel-body">

            @include('errors._form')

             {!! Form::model($processes, ['method' => 'PATCH', 'url' => 'processes/'.$processes->id]) !!}
            <div class="form-group">
                {!! Form::label('title', 'Title:') !!}
                {!! Form::text('title', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
                {!! Form::button('Cancel', ['class' => 'btn btn-primary']) !!}
            </div>
        {!! Form::close() !!}


            <div class="clearfix"></div>

        </div>
    </div>
</div>

@endsection