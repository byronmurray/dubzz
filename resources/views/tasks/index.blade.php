@extends('../layouts.app')

@section('content')

<div class="col-md-10">
    <div class="panel panel-default">
        <div class="panel-heading">Tasks
            <a href="{{ action('TaskController@create') }}">
                <button class="btn btn-primary btn-sm pull-right btn--panel-heading">
                    <span class="glyphicon glyphicon-paste" aria-hidden="true"></span> New Task
                </button>
            </a>
        </div>

        <div class="panel-body">

            @include('flash::message')
            <ul class="list-group">
                @foreach ($tasks as $task)
                    <li class="list-group-item"><a href="{{ url('/tasks/'.$task->id)}}">{{ $task->title}} </a></li>
                @endforeach
            </ul>

            {{ $tasks->links() }}

        </div>
    </div>
</div>

@endsection