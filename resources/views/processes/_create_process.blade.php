<div class="modal" id="create-process" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Create New Process</h4>
        </div>
        <div class="modal-body">
            
        <form action="{{ url('/processes/')}}" method="POST">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="title" value="{{ old('title') }}">
            <input type="hidden" name="process_id" value="{{ $parent_id }}">
          </div>
          
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">{{ $submit }}</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        </form>
        </div>
      </div>
    </div>
</div>