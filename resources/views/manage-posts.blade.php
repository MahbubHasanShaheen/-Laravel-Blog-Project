@extends('font_layout')
@section('content')
 <!--Get Latest post-->
 <main class="container">
 	<div class="row">
 		<div class="col-md-9 mb-5">
     
         <h3>Manage Post</h3>
     <div class="post_form" style="width: 100%;margin: 0 auto;">
              
              <table class="table table-bordered">
        <thead>
          <th>ID</th>
          <th>Category</th>
          <th>Title</th>
         
         
          <th>Thumb</th>
          <th>Images</th>
          <th>Action</th>
        </thead>

        <tbody>
          @foreach($data as $post)
          <tr>
            <td>{{$post->id}}</td>
            <th>{{$post->category->title}}</th>
            <td>{{$post->title}}</td>
           
            
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
          <!--right sidebar-->

          <div class="col-md-3 ">
          	<div class="card mt-4">
          		<h5 class="card-header">Search</h5>
          		<div class="card-body">
                         <form action="{{url('/')}}">
          			<div class="input-group">
					  <input type="text" class="form-control" name="q" >
					  <div class="input-group-append">
					    <button class="btn btn-dark" type="button">Search</button>
					 </div>
                      </div>
                      </form>
          		</div>
          			
          		</div>

                    <!--Recent Post-->
          	 <div class="card mt-4">
          		<h5 class="card-header">Recent Post</h5>
          		  <div class="list-group-flush">
          		  	@if($recent_post_limit)
          		  	@foreach($recent_post_limit as $post)
          		  	<a class="list-group-item" href="#">{{$post->title}}</a>
          		  	
          		  	@endforeach
                         @endif
          		  </div>
          		
          	  </div>
               

          	        <!--Popular Post-->
          	 <div class="card mt-4">
          		<h5 class="card-header">Popular Post</h5>
          		          <div class="list-group-flush">
                     @if($popular_post_limit)
                    @foreach($popular_post_limit as $post)
                    <a class="list-group-item" href="#">{{$post->title}}<span class="badge badge-info ml-2">{{$post->views}}</span></a>
                    @endforeach
                    @endif
                  </div>
          		
          	  </div>

          	</div>
          </div>

 	
 </main>



    
@endsection