  <div class="modal" id="update_title-{{ $process->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">{{ $process->title}}</h4>
        </div>
        <div class="modal-body">
                                        
        {!! Form::model($process, ['method' => 'PATCH', 'url' => 'processes/'.$process->id]) !!}
          <div class="form-group">
              {!! Form::label('title', 'Title:') !!}
              {!! Form::text('title', null, ['class' => 'form-control']) !!}
          </div>

          <div class="form-group">
              {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
              {!! Form::button('Cancel', ['class' => 'btn btn-primary', 'data-dismiss' => 'modal']) !!}
          </div>
      {!! Form::close() !!}

        </div>
      </div>
    </div>
  </div>