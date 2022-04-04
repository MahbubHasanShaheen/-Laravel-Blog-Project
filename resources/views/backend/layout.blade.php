<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="@yield('meta_desc')">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    @if(!Session::has('adminData'))
    <script type="text/javascript">
      window.location.href = "{{url('admin/login')}}";
    </script>
    @endif()




    <title>@yield('title', 'Admin Dashboard')</title>

     </head>
   <body>



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



          <li class="nav-item">
          <a class="nav-link" href="{{url('admin/logout')}}" style="margin-left:400px;font-size:20px">

          Logout<i class="fa fa-sign-out" style="font-size:24px;margin-left:10px;"></i></a>
        </li>

           <li class="nav-item">
          <a class="nav-link" href="{{url('admin/setting')}}" style="margin-left:10px;font-size: 20px;">
            <i class="fa fa-gear fa-spin" style="font-size:24px;color: red;"></i>
            Setting</a>
        </li>


      </ul>
    </div>
  </div>
</nav>

      <div class="container-fulid">
        <div class="row">
           <div class="col-md-3">
              <div class="left_side-dark bg-dark" style="min-height: 520px;background-color: darkgray;">
                 <div class="list-group">
                  <a href="#" class="list-group-item list-group-item-action active">
                    Tables
                  </a>
                  <a href="{{url('admin/category')}}" class="list-group-item list-group-item-action">Category List</a>
                  <a href="{{url('admin/post')}}" class="list-group-item list-group-item-action">Post List</a>
                  <a href="{{url('admin/comment')}}" class="list-group-item list-group-item-action">Comment List</a>
                 <a href="{{url('admin/user')}}" class="list-group-item list-group-item-action">User</a>

                 <a href="{{url('admin/setting')}}" class="list-group-item list-group-item-action">Setting</a>
                 <a href="" class="list-group-item list-group-item-action p-5"></a>
                 <a href="" class="list-group-item list-group-item-action p-5"></a>
                 <a href="" class="list-group-item list-group-item-action p-5"></a>
                </div>

                </div>
              </div>

        




  @yield('content')

          
        </div>
      </div>

      <div class="footer-dark bg-dark">
         <div class="container">
            <div class="row">
              <p style="text-align: center; color:white;padding: 15px;">Copywright@csdbangladesh. All right reserved www.csdbangladesh.com</p>
            </div>
         </div>
      </div>
 </div>







    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
   
  </body>
</html>




