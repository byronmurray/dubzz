@extends('../layouts.admin')

@section('content')


<div class="col-md-10">
    <div class="panel panel-default">
        <div class="panel-heading">All Tags</div>

        <div class="panel-body">

        <a href="{{ route('tags.create') }}"><button class="btn btn-primary">Add New</button></a>

        <h2>Tags</h2>


        <table class="table table-striped">
          <thead>
            <tr>  
              <th>Title</th> 
              <th>Date</th>
              <th>Tasks</th> 
              <th>Edit</th>
              <th>Delete</th>
            </tr> 
          </thead>
          <tbody>
            @foreach ($tags as $tag)

            {{-- {{ var_dump($tag->revisions->seen )}} --}}
                <tr>
                <td><a href="{{ route('tags.show', [$tag->id]) }}">{{ $tag->name}} </a></td>
                <td>{{ $tag->created_at }}</td>
                <td> {{ count($tag->tasks) }} </td> 
                <td><button class="btn btn-default btn-sm">Edit</button></td>
                
                <td><button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#myModal-{{ $tag->id }}">
                          <span class="glyphicon glyphicon-trash" title="delete tag"></span>
                      </button></td>
              </tr>


               <div class="modal" id="myModal-{{ $tag->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title" id="myModalLabel">{{$tag->name}}</h4>
                        </div>
                        <div class="modal-body">
                          <p>Are you sure you want to delete <strong>{{ $tag->name }}</strong>?</p>
                        </div>
                        <div class="modal-footer">
                          {{ Form::open(['method' => 'DELETE', 'route' => ['tags.destroy', $tag->id]]) }}
                            {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                            {{ Form::submit('Cancel', ['class' => 'btn btn-default', 'data-dismiss' => 'modal' ]) }}
                          {{ Form::close() }}
                        </div>
                      </div>
                    </div>
                </div>




            @endforeach
          </tbody> 
        </table>



        </div>
    </div>
</div>

@endsection        


