<div class="modal" id="assign-task" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">{{ $processes->title}}</h4>
        </div>
        <div class="modal-body">
                                        
        <form action="{{ url('/processes/'.$processes->id.'/tasks')}}" method="POST">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <div class="form-group">
             <select class="form-control" multiple="multiple" id="tasks" name="task_id[]">
                
                @foreach($taskList as $task)
                    <option value="{{$task->id}}">{{$task->title}}</option>
                @endforeach

              </select>
          </div>

          <button type="submit" class="btn btn-default">Assign</button>
        </form>

        </div>
      </div>
    </div>
</div>