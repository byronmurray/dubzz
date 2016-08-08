<table class="table table-striped">
  <thead>
    <tr>  
      <th>Title</th> 
      <th width="5%">Processes</th> 
      <th width="5%">Tasks</th>
      <th width="5%">View</th>
      <th width="5%">Edit</th>
      <th width="5%">Delete</th>
    </tr> 
  </thead>
  <tbody>
  @foreach ($var as $process)


  <tr>
    <td>{{ $process->title}}</td>
    <td class="text-center">
        @if (count($process->processes))
            {{ count($process->processes)}}
        @endif
    </td> 
    <td class="text-center">
      @if (count($process->tasks)) 
          {{ count($process->tasks) }}
      @endif
    </td>
    <td>
      <a href="{{ url('/processes/'.$process->id)}}" title="view process">
          <button class="btn btn-primary btn-xs">
              <span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span>
          </button>
        </a>
    </td>
    <td>
      <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#update_title-{{ $process->id }}">
          <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
      </button>
    </td>
    <td>
      <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#myModal-{{ $process->id }}">
          <span class="glyphicon glyphicon-trash" title="delete process"></span>
      </button>
    </td>
  </tr> 
    
  {{-- modal for deleting a process --}}
  @include('processes._delete_tasks')


  {{-- modal for editing the process title --}}
  @include('processes._edit_title')


  @endforeach

  </tbody> 
</table>





 