<div class="modal" id="myModal-{{ $process->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">{{$process->title}}</h4>
        </div>
        <div class="modal-body">
            <p class="danger"><strong>Warning</strong> deleting this process will also delete any sub processes attached to this process</p>
          <p>Are you sure you want to delete <strong>{{ $process->title }}</strong>?</p>
        </div>
        <div class="modal-footer">
          {{ Form::open(['method' => 'DELETE', 'route' => ['processes.destroy', $process->id]]) }}
            {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
            {{ Form::submit('Cancel', ['class' => 'btn btn-default', 'data-dismiss' => 'modal' ]) }}
          {{ Form::close() }}
        </div>
      </div>
    </div>
</div>