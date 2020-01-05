<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Resources\PostResource;
class ApiPostController extends Controller
{


    public function index()
    {
        return PostResource::collection(Post::paginate(3));
        
    }

    public function show($id)
    {
        $post = Post::find($id);
        return new PostResource($post);
    }

    public function store()
    {
        Post::create([
            'title' => request()->title,
            'content' => request()->content,
            'user_id' => request()->user()->id

        ]);
      // return redirect()->route('posts.index');
    }
}
