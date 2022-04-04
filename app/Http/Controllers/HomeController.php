<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Category;
class HomeController extends Controller
{
  function index(Request $request){
    if($request->has('q')){
      $q=$request->q;
      //$posts = Post::orderBy('id','desc')->simplePaginate(3);
      $posts = Post::where('title','like','%'.$q. '%')->orderBy('id','desc')->paginate(2);
    }else{
      //$posts = Post::orderBy('id','desc')->simplePaginate(3);
       $posts = Post::orderBy('id','desc')->paginate(6);
    }
    
    return view('home',['posts' => $posts]);
  }


//all category
  function all_category(){
      $categories = Category::orderBy('id','desc')->paginate(2);
      return view('categories',['categories' => $categories]);
  }



//all post acroding to the category
  function category(Request $request, $cat_id){
      $category=Category::find($cat_id);
      $posts = Post::where('cat_id',$cat_id)->orderBy('id','desc')->paginate(2);
      return view('category',['posts' => $posts, 'category' => $category]);
  }



//post details...                                                                                   
  function details(Request $request, $postId){
    //Update post count
       Post::find($postId)->increment('views');
      $details=Post::find($postId);
      return view('details',['details' => $details]);
  }

  //save-comment...
  function save_comment(Request $request, $id){
  $request->validate([
    'comment' => 'required',
  ]);
  $data = new Comment;
  $data->user_id = $request->user()->id;
  $data->post_id = $id;
  $data->comment=$request->comment;
  $data->save();
  return redirect('details/'.$id)->with('success','Coment has been submited.');
  }


// User submit post......
  function save_post_form(){
    $cats = Category::all();
    return view('save-post-form',['cats' => $cats]);
  }
  //save post data..
  function save_post_data(Request $request){
             $request->validate([
            'title'=>'required',
            'category'=>'required',
            'details'=>'required',
        ]);
       //post thumbnalil
        if($request->hasFile('thumb')){
            $image=$request->file('thumb');
            $reThumb=time().'.'.$image->getClientOriginalExtension();
            $dest1=public_path('/imgs/thumb');
            $image->move($dest1,$reThumb);
        }else{
            $reThumb = 'na';
        }
         
         //Post Full Img
        if($request->hasFile('full_img')){
            $image2=$request->file('full_img');
            $reFullimg=time().'.'.$image2->getClientOriginalExtension();
            $dest2=public_path('/imgs/full');
            $image2->move($dest2,$reFullimg);
        }else{
            $reFullimg = 'na';
        }

        $post = new Post;
        $post->user_id = $request->user()->id;
        $post->title = $request->title;
        $post->cat_id = $request->category;
        $post->thumb = $reThumb;
        $post->full_img = $reFullimg;
        $post->details = $request->details;
        $post->tags = $request->tags;
        $post->status = 1;
        $post->save();

        return redirect('save-post-form')->with('success', 'Post has been Successfuly');
  }

   function manage_posts(Request $request){
      $posts = Post::where('user_id',$request->user()->id)->orderBy('id','desc')->get();
      return view('manage-posts',['data' => $posts]);
  }


}
