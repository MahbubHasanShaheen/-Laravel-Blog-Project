


          @extends('backend.layout')
          @section('content')
           <div class="col-md-9">
             <div class="right_side">
              
                <div class="row mt-4">
                  <div class="col-md-3">
                       <div class="badge bg-primary" style="width:220px; height: 80px;">
                       <h3 class="mt-2">Categories : {{\App\Models\Category::count()}}</h3>
                       <a class="card-footer text-white" href="{{url('admin/category')}}">View Details</a>
                    </div>
                  </div>

                  <div class="col-md-3 md-576">
                    <div class="badge bg-warning" style="width:220px; height: 80px;">
                       <h3 class="mt-2">Post : {{\App\Models\Post::count()}}</h3>
                       <a class="card-footer text-white" href="{{url('admin/post')}}">View Details</a>
                    </div>
                    
                  </div>

                  <div class="col-md-3">
                       <div class="badge bg-success" style="width:220px; height: 80px;">
                      <h3 class="mt-2">Comment : {{\App\Models\Comment::count()}}</h3>
                      <a class="card-footer text-white" href="{{url('admin/comment')}}">View Details</a>
                    </div>
                  </div>

                       <div class="col-md-3">
                       <div class="badge bg-danger" style="width:220px; height: 80px;">
                       <h3 class="mt-2">User: {{\App\Models\User::count()}}</h3>
                       <a class="card-footer text-white" href="{{url('admin/user')}}">View details</a>
                    </div>
                  </div>

                </div>
             </div>



             <div class="post_data mt-5">
               <table class="table table-striped table-bordered" id="dataTable" >
        <thead>
          <th>ID</th>
          
          <th>Title</th>
          <th>Details</th>
          <th>Tags</th>
          <th>Thumbnail</th>
          <th>Images</th>
          <th>Action</th>
        </thead>

        <tbody>
          @foreach($posts as $post)
          <tr>
            <td>{{$post->id}}</td>
            
            <td>{{$post->title}}</td>
            <td>{{$post->details}}</td>
            <td>{{$post->tags}}</td>
            <td><img src="{{asset('imgs/thumb').'/'.$post->thumb}}" style="height:40px;width:50px"></td>
            <td><img src="{{asset('imgs/full').'/'.$post->full_img}}" style="height:40px;width:50px"></td>
            <td>
              <a class="btn btn-info" href="{{url('admin/post/'.$post->id.'/edit')}}">Edit</a>
              <a onclick="return confirm('Are you sure delete this data?')" class="btn btn-danger" href="{{url('admin/post/'.$post->id.'/delete')}}">Delete</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
             </div>


           </div>
           @endsection


<script type="text/javascript">
  

  $(document).ready( function () {
    $('#postTable').DataTable();
} );
</script>