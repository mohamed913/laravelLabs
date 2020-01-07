<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Http\Requests\StoreBlogPost;

class PostController extends Controller
{
    
   function index()
    {
        //with user to eager to light the load in database
         // paginate to orgainse the number of elelments that appear in the page 
        $posts=Post::with('user')->paginate(3);
        return view('index',['posts'=>$posts]);   //another way return request()->post;
    }

    function create()
    {
        return view('posts/create');
    }

    public function store(StoreBlogPost $request)
    {
       
        Post::create([
            'title' => request()->title,
            'content' => request()->content,
            'user_id' => $request->user()->id

        ]);
       return redirect()->route('posts.index');
    }

    function show($post)
    {
        $any=post::find($post);
        return view('show',['mypost'=>$any]);   //another way return request()->post;
    }

    function edit($post)
    {
        $alldata=post::find($post);
        return view('edit',['ourpost'=>$alldata]);   //another way return request()->post;
    }

    public function update(StoreBlogPost $req, $id)
    {
       //بمسك ال اﻻى دى فى متغير اسمه request
        $request=post::find($id);
        //the title on the left is the title in the database and the 
        //title  in the right is the title in form 
        $request->title=$req->title;
        $request->content=$req->content;
        $request->save();
        return redirect()->route('posts.index');
        
    }

    public function destroy($id)
    {
       //بمسك ال اﻻى دى فى متغير اسمه request
        $request=post::find($id);
       $request->delete();
       return redirect()->route('posts.index');
        
        
    }
}
