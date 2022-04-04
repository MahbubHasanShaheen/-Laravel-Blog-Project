 @extends('backend.layout')
   @section('content')


	<div class="row" style="min-height:500px; width: 70%; margin: 0 auto;">
		              
		              	<h3 style="text-align:center;padding-top: 10px;">Manage Setting</h3>
		            

		          
		            
             <div class="post_form" style="width: 100%;margin: 0 auto;">
                 @if($errors)
					        @foreach($errors->all() as $error)
					         <p class="text-danger">{{ $error }}</p>
					        @endforeach
					       @endif()


					       @if(Session::has('success'))
					        <p class="text-success">{{session('success')}}</p>
					       @endif
              <form action="{{url('admin/setting')}}" method="POST" enctype="multipart/form-data">
                 	@csrf


					  
			<table class="table table-bordered">

             <tr>
              <td>Comment Auto Aproved</td>
              <td><input @if($setting) value="{{$setting->comment_auto_approved}}" @endif type="text" class="form-control" name="comment_auto_approved" ></td>
             </tr>



              <tr>
               <td>User Auto Aproved</td>
              <td><input @if($setting) value="{{$setting->user_auto_approved}}" @endif type="text" class="form-control" name="user_auto_approved" ></td>
             </tr>


              <tr>
              <td>Recent Post Limit</td>
              <td><input @if($setting) value="{{$setting->recent_post_limit}}" @endif type="text" class="form-control" name="recent_post_limit" ></td>
             </tr>


               <tr>
               <td>Popular Post Limit</td>
              <td><input @if($setting) value="{{$setting->popular_post_limit}}" @endif type="text" class="form-control" name="popular_post_limit" ></td>
              </tr>



              <tr>
               <td>Recent Comments Limit</td>
              <td><input @if($setting) value="{{$setting->recent_comment_limit}}" @endif type="text" class="form-control" name="recent_comment_limit" ></td>
              </tr>

				<tr>
				 <td></td>
				 <td><button type="submit" class="btn btn-primary">Submit</button></td>
			  </tr>

			</table>

		</form>

           
           </div>
      </div>
@endsection    