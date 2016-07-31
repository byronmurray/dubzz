@extends('../layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Edit {{ $tasks->title}}</div>

                <div class="panel-body">

                    @include('errors._form')

                    <form action="{{ url('/tasks/'.$tasks->id)}}" method="POST">
                      {{ method_field('PATCH') }}
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" value="{{ $tasks->title }}">
                      </div>
                      <div class="pull-right">
                        <button type="submit" class="btn btn-primary">Update</button> <button class="btn btn-default">Cancel</button>
                      </div>
                      
                    </form>


                    <div class="clearfix"></div>

                    @if ($tasks->steps)
                      <ul class="list-group">
                        @foreach ($tasks->steps as $step)
                          <li class="list-group-item"> {{ $step->title}} 
                            <div class="pull-right">
                              <a href="{{ action('StepController@edit', [$step->id]) }}" title="edit process">
                                  <button class="btn btn-primary btn-xs">
                                      <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                  </button>
                              </a> 
                              <button class="btn btn-danger btn-xs">
                                  <span class="glyphicon glyphicon-trash" title="delete process"></span>
                              </button>
                            </div>
                          </li>
                        @endforeach
                      </ul>
                    @endif

                </div>
            </div>
        </div>
    </div>

@endsection