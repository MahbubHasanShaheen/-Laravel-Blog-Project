<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $data=Post::all();
        return view('backend.post.index',[
       'data' => $data,
           
         ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {     
          $cats=Category::all();
          return view('backend.post.add',['cats' => $cats]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
        $post->user_id = 0;
        $post->title = $request->title;
        $post->cat_id = $request->category;
        $post->thumb = $reThumb;
        $post->full_img = $reFullimg;
        $post->details = $request->details;
        $post->tags = $request->tags;
        $post->save();

        return redirect('admin/post')->with('success', 'Data insert Successfuly');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cats = Category::all();
        $data = Post::find($id);
       return view('backend.post.edit',['cats' => $cats, 'data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
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
            $reThumb = $request->thumb;
        }
         
         //Post Full Img
        if($request->hasFile('full_img')){
            $image2=$request->file('full_img');
            $reFullimg=time().'.'.$image2->getClientOriginalExtension();
            $dest2=public_path('/imgs/full');
            $image2->move($dest2,$reFullimg);
        }else{
            $reFullimg = $request->full_img;;
        }

        $post = Post::find($id);
        $post->cat_id = $request->category;
        $post->title = $request->title;
        $post->thumb = $reThumb;
        $post->full_img = $reFullimg;
        $post->details = $request->details;
        $post->tags = $request->tags;
        $post->save();

        
        return redirect('admin/post/'.$id.'/edit')->with('success', 'Data Update Successfuly');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::where('id', $id)->delete();
        return redirect('admin/post');
    }
}
