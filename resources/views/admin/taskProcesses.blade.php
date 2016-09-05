@extends('../layouts.admin')

@section('content')

<div class="col-md-10">
    <div class="panel panel-default">
        <div class="panel-heading">Processes Assigned to {{ $tasks->title }}</div>

        <div class="panel-body">

            <ul class="list-group">
                @foreach ($processes as $process)
					<a href="{{ route('processes.show', [$process->id]) }}"><li class="list-group-item">{{ $process->title }}</li></a>
				@endforeach
            </ul>

        </div>
    </div>
</div>






@endsection