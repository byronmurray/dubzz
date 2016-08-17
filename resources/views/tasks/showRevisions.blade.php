@extends('../layouts.app')

@section('content')


<div class="col-md-10">
    <div class="panel panel-default">
        <div class="panel-heading">{{ $tasks->title}}</div>
            <div class="panel-body">
        
                @if (count($revisions))
                    <h4>Revisions</h4>
                    <ul class="list-group">
                        @foreach ($revisions as $revision)
                            <li class="list-group-item"><a href="{{ action('RevisionController@show', $revision->id) }}">{{ $revision->title }}</a><span class="pull-right">Created on the {{ $revision->created_at }}</span></li>
                        @endforeach
                    </ul>
                @endif

            </div>


        </div>
    </div>
</div>


@endsection