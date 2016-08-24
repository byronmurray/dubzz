@extends('../layouts.app')

@section('content')

<div class="col-md-10">
    <div class="panel panel-default">
        <div class="panel-heading">Create New Process</div>

        <div class="panel-body">

          @include('errors._form')

          <form action="{{ url('/processes/')}}" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
              <label for="title">Title</label>
              <input type="text" class="form-control" name="title" value="{{ old('title') }}">
              <input type="hidden" name="process_id" value="{{ $id }}">
              
            </div>
            
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
          </form>


          <div class="clearfix"></div>

        </div>
    </div>
</div>

@endsection        


