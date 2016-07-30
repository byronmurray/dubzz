@if (count($errors))
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error )
          <strong>Error!</strong> {{ $error }}
        @endforeach
    </div>
@endif