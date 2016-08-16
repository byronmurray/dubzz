@extends('../layouts.admin')

@section('content')


Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.

<h2>Latest Activity</h2>
<table class="table table-striped">
  <thead>
    <tr>  
      <th>Title</th> 
      <th width="5%">Type</th> 
      <th width="5%">User</th>
      <th width="20%">Date</th>
      <th width="5%">Status</th>
    </tr> 
  </thead>
  <tbody>
  <tr>
    <td>the title</td>
    <td>
        Task
    </td> 
    <td>
      Username
    </td>
    <td>
      13 of August 2016
    </td>
    <td>
      Updated
    </td>
  </tr>
  <tr>
    <td>the title</td>
    <td>
        Task
    </td> 
    <td>
      Username
    </td>
    <td>
      23 of August 2016
    </td>
    <td>
      Updated
    </td>
  </tr> 
  <tr>
    <td>My title</td>
    <td>
        Process
    </td> 
    <td>
      Username
    </td>
    <td>
      29 of August 2016
    </td>
    <td>
      Deleted
    </td>
  </tr>  

  </tbody> 
</table>

@endsection