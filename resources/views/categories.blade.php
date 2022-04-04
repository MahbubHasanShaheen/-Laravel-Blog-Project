 @extends('font_layout')
   @section('content')

 <!--Get Latest post-->
 <main class="container">
 	<div class="row">
 		<div class="col-md-9">
 		  <div class="row"> 
 		@if(count ($categories) > 0)
 		@foreach($categories as $category)
 		<div class="col-md-4 mb-3">
          <div class="card mt-4">
		    <img class="card-img-top" src="{{asset('imgs/'.$category->image)}}" alt="" style="height:150px;border:1px solid gray">
			<div class="card-body">
			 <h5 class="card-title"><a href="{{url('category/'.$category->id)}}">{{$category->title}}</a></h5>
			  </div>
               </div>
 		</div>
          @endforeach
           @else
           <p class="alert alert-danger">No post found</p>
          @endif
 	    </div>
           <!--Pagination bar-->
           {{$categories->links()}}
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
          		  	<a class="list-group-item" href="#">Post 1</a>
          		  	<a class="list-group-item" href="#">Post 1</a>
          		  </div>
          		
          	  </div>

          	</div>
          </div>

 	
 </main>



 @endsection




