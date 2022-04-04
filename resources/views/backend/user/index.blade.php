   @extends('backend.layout')
   @section('content')
           <div class="col-md-9">
               <div class="category">
  <div class="container">
    <div class="row">

      <div class="col-md-8">
        <h3>All User</h3>
      </div>

      <div class="col-md-4">
       
      </div>
      
     
      
      <hr>

      <table class="table table-striped">
        <thead>
          <th>ID</th>
          <th>Name</th>
          <th>Email</th>
         
          <th>Action</th>
        </thead>

        <tbody>
          @foreach($data as $user)
          <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            
            <td>
              <a onclick="return confirm('Are you sure delete this data?')" class="btn btn-danger" href="{{url('admin/user/delete/'.$user->id)}}">Delete</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
      
 </div>
           </div>


        </div>
      </div>

@endsection