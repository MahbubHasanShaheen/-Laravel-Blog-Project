   @extends('backend.layout')
          @section('content')
           <div class="col-md-9">
               <div class="category">
  <div class="container">
    <div class="row">

      <div class="col-md-8">
        <h3>Category Data Table</h3>
      </div>

      <div class="col-md-4">
        <a href="{{url('admin/category/create')}}" class="btn btn-primary" style="margin-top:15px;float: right;">Add Data</a>
      </div>
      
     
      
      <hr>

      <table class="table table-striped">
        <thead>
          <th>ID</th>
          <th>Title</th>
          <th>Details</th>
          <th>Images</th>
          <th>Action</th>
        </thead>

        <tbody>
          @foreach($data as $cat)
          <tr>
            <td>{{$cat->id}}</td>
            <td>{{$cat->title}}</td>
            <td>{{$cat->details}}</td>
            <td><img src="{{asset('imgs').'/'.$cat->image}}" style="height:40px;width:50px"></td>
            <td>
              <a class="btn btn-info" href="{{url('admin/category/'.$cat->id.'/edit')}}">Edit</a>
              <a onclick="return confirm('Are you sure delete this data?')" class="btn btn-danger" href="{{url('admin/category/'.$cat->id.'/delete')}}">Delete</a>
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