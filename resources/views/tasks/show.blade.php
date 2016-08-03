@extends('../layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">{{ $tasks->title}}
                    <a href="{{ action('TaskController@edit', [$tasks->id]) }}">
                        <button class="btn btn-primary btn-sm pull-right btn--panel-heading">
                            <span class="glyphicon glyphicon-paste" aria-hidden="true"></span> Edit
                        </button>
                    </a>
                </div>

                <div class="panel-body">

                <small>Created by {{ $tasks->user->name}} on the {{ date_format($tasks->created_at,"jS F Y") }} at {{ date_format($tasks->created_at,"H:i a") }}</small>

                @include('flash::message')

                <p>{!! $tasks->body !!}</p>


                

                </div>
            </div>
        </div>
    </div>

@endsection