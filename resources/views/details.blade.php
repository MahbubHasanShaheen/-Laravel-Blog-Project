
 <!--Get Latest post-->
 @extends('font_layout')
 @section('title','details->title')
 @section('content')
<div class="row">
 		<div class="col-md-9">
            @if(Session::has('success'))
            <p class="text-success">{{session('success')}}</p>
            @endif
 	        <div class="card mt-4">

 	        	<h3 class="card-header">
                    {{$details->title}}
                    <span style="float:right; font-size: 18px;">Total View : {{$details->views}}</span>
                </h3>

 	        	<img class="card-img-top" src="{{asset('imgs/full/'.$details->full_img)}}" alt="{{$details->title}}" style="width:400px;border:1px solid gray">
 	        	<div class="card-body">
 	        		<p>{{$details->details}}</p>
 	        	</div>

                <div class="card-footer">
                    <a href="{{url('category/'.$details->category->id)}}">{{$details->category->title}}</a>
                </div>
 	        	
 	        </div>

             <!--Add Comment-->
             @auth
             <div class="card my-5">
               <h5 class="card-header">Add Comment</h5>
               <div class="card-body">
                    <form action="{{url('save-comment/'.$details->id)}}" method="post">
                        @csrf
                         <textarea class="form-control" name="comment"></textarea>
                         <input type="submit" class="btn btn-dark mt-2">
                         
                    </form>
                    </div>
               </div>
               @endauth
                  <!--Fetch Comment-->
                  <div class="card my-4">
                    <h5 class="card-header">Comments<span class="badge badge-dark ml-2">{{count($details->comments)}}</span></h5>
                     <div class="card-body">
                       @if($details->comments)
                       @foreach($details->comments as $comment)
                       <figure>
                           <blockquote class="blockquote">
                             <p>{{$comment->comment}}</p>
                           </blockquote>
                           @if($comment->user_id ==0)
                           <figcaption class="blockquote-footer">
                            Admin
                             

                           </figcaption>
                           @else
                           <figcaption class="blockquote-footer">
                          
                             {{$comment->user->name}}

                           </figcaption>
                           @endif
                         </figure>
                       
                       @endforeach
                       @endif
                    </div>
                  </div>
             </div>
         
         
          <!--right sidebar-->

          <div class="col-md-3 ">
          	<div class="card mt-4">
          		<h5 class="card-header">Search</h5>
          		<div class="card-body">
                         <form action="{{url('/')}}">
          			<div class="input-group">
					  <input type="text" class="form-control" name="q">
					  <div class="input-group-append">
					    <button class="btn btn-dark"  type="button"  id="button-addon2">Search</button>
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

 	 @endsection('content')



 
    



      




