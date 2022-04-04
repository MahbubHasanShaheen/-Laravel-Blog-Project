   @extends('backend.layout')
   @section('content')
           <div class="col-md-9">
               <div class="category">
  <div class="container">
    <div class="row">

      <div class="col-md-8">
        <h3>All Comment</h3>
      </div>

      <div class="col-md-4">
       
      </div>
      
     
      
      <hr>

      <table class="table table-striped">
        <thead>
          <th>ID</th>
          <th>User Name</th>
          <th>Email</th>
          <th>Comment</th>
          <th>Action</th>
        </thead>

        <tbody>
          @foreach($data as $comment)
          <tr>
            <td>{{$comment->id}}</td>
            <td>@if(!empty($comment->user_id)){{$comment->user->name}}@endif</td>
            <td>@if(!empty($comment->user_id)){{$comment->user->email}}@endif</td>
            <td>{{$comment->comment}}</td>
            <td>
              <a onclick="return confirm('Are you sure delete this data?')" class="btn btn-danger" href="{{url('admin/comment/delete/'.$comment->id)}}">Delete</a>
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