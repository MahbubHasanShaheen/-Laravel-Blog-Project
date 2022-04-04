<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Admin;
use App\Models\Post;
use App\Models\Comment;
use App\Models\User;

class AdminController extends Controller
{
    //Login....
    function login(){
        return view('backend.login');
    }

  //submit_login...

    function submit_login(Request $request){
        
        $request->validate([

         'user_name'=> 'required',
         'password'=> 'required',

        ]);


        $userCheck = Admin::where(['user_name'=> $request->user_name,'password'=> $request->password])->count();
        

        if($userCheck>0){

        $adminData = Admin::where(['user_name'=> $request->user_name,'password'=> $request->password])->first();
            session(['adminData' => $adminData]);
            return redirect('admin/dashboard');
        }else{
            return redirect('admin/login')->with('error','Invalid Uesrname or Password');
        }
    }

    function dashboard(){
        $posts=Post::orderBy('id','desc')->get();
        return view('backend.dashboard',['posts'=>$posts]);
    }


    //show all comment..
    function comments(){
        $data=Comment::orderBy('id','desc')->get();
        return view('backend.comment.index',['data'=>$data]);
    }
  //Delete comment
        public function delete_comment($id)
    {
        Comment::where('id', $id)->delete();
        return redirect('admin/comment');
    }


        //show all User..
    function users(){
        $data=User::orderBy('id','desc')->get();
        return view('backend.user.index',['data'=>$data]);
    }
  //Delete User
        public function delete_user($id)
    {
        User::where('id', $id)->delete();
        return redirect('admin/user');
    }

        //Logout

   function logout(){
      session()->forget(['adminData']);
      return redirect('admin/login');
   }
}
