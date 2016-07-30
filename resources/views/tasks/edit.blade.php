@extends('../layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Task</div>

                <div class="panel-body">

                    <h2>Edit the Task Title</h2>

                    @include('errors._form')

                    <form action="{{ url('/tasks/'.$tasks->id)}}" method="POST">
                      {{ method_field('PATCH') }}
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" value="{{ $tasks->title }}">
                      </div>
                      <button type="submit" class="btn btn-default">Update</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection