@extends('../layouts.admin')

@section('content')

<div class="col-md-10">
    <div class="panel panel-default">
        <div class="panel-heading">Create a Tag</div>

        <div class="panel-body">

        @include('errors._form')

        {!! Form::open(['route' => 'tags.store']) !!}
            <div class="form-group">
                {!! Form::label('name', 'Name:') !!}
                {!! Form::text('name', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Create', ['class' => 'btn btn-primary']) !!}
            </div>
        {!! Form::close() !!}

        </div>
    </div>
</div>

@endsection 