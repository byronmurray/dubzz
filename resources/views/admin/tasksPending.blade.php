@extends('../layouts.admin')

@section('content')

<p>Admin can see all edits and new tasks created by users</p>


<h2>Pending Tasks</h2>

<table class="table table-striped">
  <thead>
    <tr>  
      <th>Title</th>
      <th>Type</th> 
      <th>User</th> 
      <th>Date</th>
      <th>Approve</th>
      <th>Delete</th>
    </tr> 
  </thead>
  <tbody>
  	@foreach ($revisions as $revision)
      	<tr>
	    	<td><a href="{{ route('revision.show', [$revision->id]) }}">{{ $revision->title}} </a></td>
        <td>{{ $revision->type }}</td>
		    <td>{{ $revision->user->name }}</td>
		    <td>{{ $revision->created_at }}</td>
		    <td><button>Approve</button></td>
		    <td><button>Delete</button></td>
  		</tr>
    @endforeach
  </tbody> 
</table>

       


@endsection
