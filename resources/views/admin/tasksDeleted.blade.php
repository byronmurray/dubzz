@extends('../layouts.admin')

@section('content')

<p>This will handle soft deletes. Admin has the option to delete them completely from app or restore.</p>

<p>Note all restores will go to pending as a new task</p>


<h2>Deleted Tasks</h2>

<table class="table table-striped">
  <thead>
    <tr>  
      <th>Title</th>
      <th>User</th> 
      <th>Date</th> 
      <th>Restore</th>
      <th>Delete</th>
    </tr> 
  </thead>
  <tbody>
  	@foreach ($tasks as $task)
      	<tr>
	    	<td><a href="{{ url('/tasks/'.$task->id)}}">{{ $task->title}} </a></td>
		    <td>{{ $task->user->name }}</td>
		    <td>{{ $task->created_at }}</td> 
		    <td><button>Restore</button></td>
		    <td><button>Delete</button></td>
  		</tr>
    @endforeach
  </tbody> 
</table>

       


@endsection
