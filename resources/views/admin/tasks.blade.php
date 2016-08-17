@extends('../layouts.admin')

@section('content')

<p>View all tasks</p>

<ul>
	<li>Add search bar</li>
	<li>filter by title tags and date?</li>
</ul>


<h2>Tasks</h2>


<table class="table table-striped">
  <thead>
    <tr>  
      <th>Title</th> 
      <th>Date</th> 
      <th>Edit</th>
      <th>Revisions</th>
      <th>Delete</th>
    </tr> 
  </thead>
  <tbody>
  	@foreach ($tasks as $task)

    {{-- {{ var_dump($task->revisions->seen )}} --}}
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
      


@endsection
