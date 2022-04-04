<!DOCTYPE html>
<html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Admin Dashboard</title>
  </head>




    <div class="dashboar">

   <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="{{url('admin/dashboard')}}">Dashboard</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Features</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Pricing</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown link
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>

  



  <div class="row" style="min-height:500px; width: 70%; margin: 0 auto;">
                  <div class="col-md-6">
                    <h3 style="text-align:center;padding-top: 10px;">Update Post</h3>
                  </div>

                  <div class="col-md-6">
                    <a href="{{url('admin/post')}}" class="btn btn-primary" style="margin-top:15px;float: right;">Data Table</a>
                  </div>
                
             <div class="category_form" style="width: 100%;margin: 0 auto;">
                 @if($errors)
                  @foreach($errors->all() as $error)
                   <p class="text-danger">{{ $error }}</p>
                  @endforeach
                 @endif()


                 @if(Session::has('success'))
                  <p class="text-success">{{session('success')}}</p>
                 @endif
              <form action="{{url('admin/post/'.$data->id)}}" method="POST" enctype="multipart/form-data">
                  @csrf
                  @method('put')
              <table class="table table-bordered">
            <tr>
              <td>Category<span class="text-danger">*</span></td>
              <td>
                <select class="form-control" name="category">
                   @foreach($cats as $cat)
                   @if($cat->id==$data->cat_id)
                  <option selected value="{{$cat->id}}">{{$cat->title}}</option>
                   @else
                   <option value="{{$cat->id}}">{{$cat->title}}</option>
                   @endif
                   @endforeach
                </select>
                </td>
              </tr>

               
             <tr>
              <td>Title</td>
              <td><input type="text" class="form-control" name="title" placeholder=" Enter Details" value="{{$data->title}}"></td>
            </tr>

              <tr>
              <td>Details</td>
              <td><textarea type="text" class="form-control" name="details" placeholder=" Enter Details" value="{{$data->details}}">{{$data->details}}</textarea></td>
            </tr>

                 <tr>
              <td>Tags</td>
              <td><input type="text" class="form-control" name="tags" placeholder=" Enter Details" value="{{$data->tags}}"></td>
            </tr>

              <tr>
               <td>Thumbnail</td>
              <td>
                <p class="my-2"><img width="60" src="{{asset('imgs/thumb')}}/{{$data->thumb}}" ></p>
                <input type="hidden" name="thumb" value="{{$data->thumb}}">
                <input type="file" class="form-control" name="thumb" >
              </td>
           
             </tr>

                      <tr>
               <td>Full Image</td>
              <td>
                <p class="my-2"><img width="60" src="{{asset('imgs/full')}}/{{$data->full_img}}" ></p>
                <input type="hidden" name="full_img" value="{{$data->full_img}}">
                <input type="file" class="form-control" name="full_img" >
              </td>
           
             </tr>

             <tr>
              <td></td>
              <td><button type="submit" class="btn btn-primary">Update</button></td>
            </tr>

               </table>

          </form>

           
           </div>
      </div>

         <div class="footer-dark bg-dark">
         <div class="container">
            <div class="row">
              <p style="text-align: center; color:white;padding: 15px;">Copywright@csdbangladesh. All right reserved www.csdbangladesh.com</p>
            </div>
         </div>
      </div>



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</body>
</html>
            











