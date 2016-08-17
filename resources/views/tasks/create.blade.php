@extends('../layouts.app')

@section('content')

<div class="col-md-10">
    <div class="panel panel-default">
        <div class="panel-heading">Create New Task</div>

        <div class="panel-body">

        @include('errors._form')

        {!! Form::open(['url' => 'tasks']) !!}
            <div class="form-group">
                {!! Form::label('title', 'Title:') !!}
                {!! Form::text('title', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('body', 'Body:') !!}
                {!! Form::textarea('body', old('title'), ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('tag_list', 'Tags:') !!}
                {!! Form::select('tag_list[]', $tags, null, ['id' => 'tag_list', 'class' => 'form-control', 'multiple']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
            </div>
        {!! Form::close() !!}
       

        </div>
    </div>
</div>

@endsection