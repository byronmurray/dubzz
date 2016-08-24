@extends('../layouts.admin')

@section('content')

<p>List of all the revisions for the current revisions</p>

<p>Check to see if any revisions exist</p>

<p>List them in a table</p>


<h2>Tasks</h2>


<table class="table table-striped">
  <thead>
    <tr>  
      <th>Title</th> 
      <th>User</th>
      <th>Date</th>
      <th>Type</th>
      <th>Status</th> 
      <th>Restore</th>
    </tr> 
  </thead>
  <tbody>
    @foreach ($revisions as $revision)
        <tr>
        <td><a href="{{ route('revision.show', [$revision->id]) }}">{{ $revision->title}}</a></td>
        <td>{{ $revision->user->name }}</td>
        <td>{{ $revision->created_at }}</td> 
        <td>{{ $revision->type}}</td>
        <td>{{ $revision->status}}</td>
        @if ($revision->status == 'version')
          <td><button class="btn btn-default btn-sm">Restore</button></td>
        @endif
        
      </tr>
    @endforeach
  </tbody> 
</table>
      


@endsection
