@extends('../layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Tasks
                    <a href="{{ action('TaskController@create') }}">
                        <button class="btn btn-primary btn-sm pull-right btn--panel-heading">
                            <span class="glyphicon glyphicon-paste" aria-hidden="true"></span> New Task
                        </button>
                    </a>
                </div>

                <div class="panel-body">

                 <button class="btn btn-default">All</button>  | <button class="btn btn-default">CAT 1</button>  | <button class="btn btn-default">CAT 2</button> | <button class="btn btn-default">CAT 3</button> | <button class="btn btn-default">CAT 4</button>

                    @include('flash::message')
                    <ul class="list-group">
                        @foreach ($tasks as $task)
                            <li class="list-group-item"><a href="{{ url('/tasks/'.$task->id)}}">{{ $task->title}} </a></li>
                        @endforeach
                    </ul>

                </div>
            </div>
        </div>
    </div>

@endsection