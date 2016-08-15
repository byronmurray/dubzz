@extends('../layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">{{ $revisions->title }}</div>

                 <div class="panel-body">

	                @include('errors._form')

	                <p>Submission created by {{ $revisions->user->name }} on the {{ $revisions->created_at }}</p>
	                <p>Maybe have a link to current task, who was created by and the created date and last updated</p>
	                <p>{!! $revisions->body !!}</p>
	                     
	                    
                    {!! Form::model($revisions, ['method' => 'PATCH', 'url' => 'revisions/'.$revisions->id]) !!}
	                    <div class="form-group">
	                    <input type="hidden" name="approved" value="1">
	                	<input type="hidden" name="seen" value="1">
	                        {!! Form::submit('Approve', ['class' => 'btn btn-primary']) !!}
	                    </div>
	                {!! Form::close() !!}

	                {!! Form::model($revisions, ['method' => 'PATCH', 'url' => 'revisions/'.$revisions->id]) !!}
	                    
	                	<input type="hidden" name="approved" value="0">
	                	<input type="hidden" name="seen" value="1">
	                    <div class="form-group">
	                        {!! Form::submit('Decline', ['class' => 'btn btn-danger']) !!}
	                    </div>
	                {!! Form::close() !!}

	                </div>

            

                </div>
            </div>
        </div>
    </div>

@endsection