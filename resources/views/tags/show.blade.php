@extends('../layouts.admin')

@section('content')

<div class="col-md-10">
    <div class="panel panel-default">
        <div class="panel-heading">All tasks for this tag</div>

        <div class="panel-body">

        <h2>{{ $tags->name }}</h2>

        <table class="table table-striped">
          <thead>
            <tr>  
              <th>Title</th> 
              <th>Date</th> 
              <th>Edit</th>
              <th>Tasks</th>
              <th>Delete</th>
            </tr> 
          </thead>
          <tbody>
            @foreach ($tags->tasks as $task)

		      	<tr>
			    	<td><a href="{{ url('/tasks/'.$task->id)}}">{{ $task->title}} </a></td>
				    <td>{{ $task->created_at }}</td> 
				    <td><button class="btn btn-default btn-sm">Edit</button></td>
				    <td>
		            	@unless ($task->revisions->isEmpty())
			            	<a href="{{ route('tasks.revisions', ['tasks' => $task->id]) }}">
			            		<button class="btn btn-default btn-sm">Revisions {{ count($task->revisions) }} </button>
			        		</a>
		            	@endunless
				    </td>
				    <td><button class="btn btn-danger btn-sm">Delete</button></td>
		  		</tr>
		    @endforeach
		  </tbody> 
		</table>

        </div>
    </div>
</div>

@endsection      