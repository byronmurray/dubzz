@extends('../layouts.admin')

@section('content')

<div class="row">
  <div class="col-md-8">

  <button class="btn btn-primary">Add New</button>

  <h2>All Users</h2>
    
    <table class="table table-striped">
	  <thead>
	    <tr>  
	      <th>Usename</th> 
	      <th>Email</th> 
	      <th>Created</th>
	      <th>Last Login</th>
	      <th>Role</th>
	      <th>Remove</th>
	    </tr> 
	  </thead>
	  <tbody>
	  	@foreach ($users as $user)

	    {{-- {{ var_dump($task->revisions->seen )}} --}}
	      	<tr>
		    	<td><a href="{{ url('/users/'.$user->id)}}">{{ $user->name}} </a></td>
			    <td>{{ $user->email }}</td> 
			    <td>{{ $user->created_at }}</td>
			    <td>{{ $user->updated_at }}</td>
			    <td>{{ $user->role }}</td>
			    <td><button class="btn btn-danger btn-sm">Remove</button></td>
	  		</tr>
	    @endforeach
	  </tbody> 
	</table>

  </div>

</div>



</div>
     

@endsection