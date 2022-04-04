   @extends('backend.layout')
   @section('content')
           <div class="col-md-9">
               <div class="category">
  <div class="container">
    <div class="row">

      <div class="col-md-8">
        <h3>Post Data Table</h3>
      </div>

      <div class="col-md-4">
        <a href="{{url('admin/post/create')}}" class="btn btn-primary" style="margin-top:15px;float: right;">Add Data</a>
      </div>
      
     
      
      <hr>

      <table class="table table-striped">
        <thead>
          <th>ID</th>
          <th>Category</th>
          <th>Title</th>
          <th>Details</th>
          <th>Tags</th>
          <th>Thumbnail</th>
          <th>Images</th>
          <th>Action</th>
        </thead>

        <tbody>
          @foreach($data as $post)
          <tr>
            <td>{{$post->id}}</td>
            <th>{{$post->category->title}}</th>
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
      
 </div>
           </div>


        </div>
      </div>

@endsection