@extends('font_layout')
@section('content')
 <!--Get Latest post-->
 <main class="container">
 	<div class="row">
 		<div class="col-md-9 mb-5">
     
         <h3>Add Post</h3>
     <div class="post_form" style="width: 100%;margin: 0 auto;">
                 @if($errors)
                            @foreach($errors->all() as $error)
                             <p class="text-danger">{{ $error }}</p>
                            @endforeach
                           @endif()


                           @if(Session::has('success'))
                            <p class="text-success">{{session('success')}}</p>
                           @endif
              <form action="{{url('save-post-form')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                      
                        <table class="table table-bordered">

              <tr>
              <td>Category<span class="text-danger">*</span></td>
              <td>
                <select class="form-control" name="category">
                   @foreach($cats as $cat)
                  <option value="{{$cat->id}}">{{$cat->title}}</option>
                   @endforeach
                </select>
                </td>
              </tr>




              <tr>
               <td>Title<span class="text-danger">*</span></td>
              <td><input type="text" class="form-control" name="title" ></td>
             </tr>



                       <tr>
                        <td>Details</td>
                        <td>
                <textarea class="form-control" name="details"></textarea>
              </td>
                      </tr>


              <tr>
               <td>Tags</td>
              <td><input type="text" class="form-control" name="tags" ></td>
           
             </tr>

                        <tr>
                         <td>Thumbnails</td>
                        <td><input type="file" class="form-control" name="thumb" ></td>
                       </tr>

                  <tr>
               <td>Full Image</td>
              <td><input type="file" class="form-control" name="full_img" ></td>
             </tr>

                     <tr>
                        <td></td>
                        <td><button type="submit" class="btn btn-primary">Submit</button></td>
                      </tr>

                         </table>

                  </form>

           
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