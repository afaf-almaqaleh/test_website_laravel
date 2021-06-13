<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()->paginate();
        return view('post.index',compact('posts'));
    }

    public function trashedPosts()
    {
       
        $posts = Post::onlyTrashed()->where('user_id',Auth::id())->latest()->paginate();;
       // dd($posts);die;
        return view('post.trash',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $post = new Post();
        return view('post.form',compact('post'));
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
            
        ]);
        //$posts = Post::create($request->all());
        $post = Post::create([
            'user_id'=>Auth::id(),
            'title'=>$request->title,
            'body'=>$request->body,

        ]);
        return redirect()->route('post.index')->with('success','post added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('post.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
 
        $post = Post::where('id',$id)->where('user_id',Auth::id())->first();
 
        if($post===null){
            return redirect()->back();

        }
        return view('post.form',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title'=>'required',           
            'body'=>'required',
            
        ]);
        $post->update($request->all());
        return redirect()->route('post.index')->with('success','Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      
        $post = Post::where('id',$id)->where('user_id',Auth::id())->first();
 
        if($post===null){
            return redirect()->back();

        }
        $post->delete();
        return redirect()->route('post.index')->with('success','post deleted successfully');
    }

    public function softDelete($id)
    {
        
        $post = Post::where('id',$id)->where('user_id',Auth::id())->first();
 
        if($post === null){
            return redirect()->back();

        }
        $post->delete();
        return redirect()->route('post.index')->with('success','post soft deleted successfully');
    }

    public function backFromSoftDelete($id)
    {
        $post= Post::onlyTrashed()->where('id' , $id)->first()->restore();

        return redirect()->route('post.index')->with('success','post restore successfully');
    }

    public function deleteForver($id)
    {
        $post= Post::onlyTrashed()->where('id' , $id)->first()->forceDelete();

        return redirect()->route('post.index')->with('success','post delete successfully');
    }
}
