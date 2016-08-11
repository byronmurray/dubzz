@extends('../layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Processes
                    <button type="button" class="btn btn-primary btn-sm pull-right btn--panel-heading" data-toggle="modal" data-target="#create-process">
                        <span class="glyphicon glyphicon-paste" aria-hidden="true"></span> New Process
                    </button>
                </div>

                <div class="panel-body">

                        @include('errors._form')

                        @include('flash::message')

                        {{-- modal for creating a new process --}}
                        @include('processes._create_process', ['submit' => 'Create New', 'parent_id' => 0])

                        @include('processes._display_processes_tasks', ['var' => $processes])


                {{ $processes->links() }}

                </div>
            </div>
        </div>
    </div>


@endsection