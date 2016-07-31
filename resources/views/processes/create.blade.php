@extends('../layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Create New Process</div>

                <div class="panel-body">
                    @if (count($errors))
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error )
                              <strong>Error!</strong> {{ $error }}
                            @endforeach
                        </div>
                    @endif

                    @include('flash::message')

                    <form action="{{ url('/processes/')}}" method="POST">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                      </div>

                      <div class="form-group">
                        <label for="title">Assign to an exisiting process</label>
                        <select class="form-control" id="processes" name="process_id">
                            
                             
                                <option value="0"><-- This is a Top Level Process --></option>

                                @foreach($processes as $process)
                                  {{-- if a process has tasks assigned it can not be assigned to another process --}}
                                  @if ($process->tasks->isEmpty())
                                    <option value="{{$process->id}}">{{$process->title}}</option>
                                  @endif

                                @endforeach
                        </select>
                      </div>


                      <button type="submit" class="btn btn-default">Submit</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection