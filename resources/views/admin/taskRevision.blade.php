@extends('../layouts.admin')

@section('content')

<div class="row">
  <div class="col-md-8">
    
    <h2>{{ $revisions->title }}</h2>
    <p>{!! $revisions->body !!}</p>

  </div>

  <div class="col-md-4">
    <p>Submission created by {{ $revisions->user->name }} on the {{ $revisions->created_at }}</p>
    <p>Maybe have a link to current task, who was created by and the created date and last updated</p>
    {!! Form::model($revisions, ['method' => 'PATCH', 'url' => 'revisions/'.$revisions->id]) !!}

        <input type="hidden" name="approved" value="1">
        <input type="hidden" name="seen" value="1">
        <input type="hidden" name="type" value="{{ $revisions->type}}">
        
        {!! Form::submit('Approve', ['class' => 'btn btn-primary']) !!}

    {!! Form::close() !!}

    {!! Form::model($revisions, ['method' => 'PATCH', 'url' => 'revisions/'.$revisions->id]) !!}

      <input type="hidden" name="approved" value="0">
      <input type="hidden" name="seen" value="1">
      <input type="hidden" name="status" value="declined">

      {!! Form::submit('Decline', ['class' => 'btn btn-danger']) !!}

    {!! Form::close() !!}

  </div>

</div>



</div>
     

@endsection