@extends('../layouts.admin')

@section('content')

<p>Admin can view tasks that have been decline and have the option to restore or delete.</p>

<p>Note all restores will go to pending as a new task</p>


<h2>Declined Tasks</h2>

<table class="table table-striped">
  <thead>
    <tr>  
      <th>Title</th>
      <th>Type</th>
      <th>User</th> 
      <th>Date</th> 
      <th>Restore</th>
      <th>Delete</th>
    </tr> 
  </thead>
  <tbody>
  	@foreach ($revisions as $revision)
        <tr>
        <td><a href="#">{{ $revision->title}} </a></td>
        <td>{{ $revision->type }}</td>
        <td>{{ $revision->user->name }}</td>
        <td>{{ $revision->created_at }}</td>
		    <td><button>Restore</button></td>
		    <td><button>Delete</button></td>
  		</tr>
    @endforeach
  </tbody> 
</table>

       


@endsection
