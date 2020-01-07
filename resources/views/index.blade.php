@extends('layouts/app')

@section('content')
<a href='/posts/create' class="btn btn-success" >Create New Post</a>
<div class="container"><div class="row"><div class="col">
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">user_name</th>
            <th scope="col">Title</th>
            <th scope="col">Slug</th>
            <th scope="col">Content</th>
            <th scope="col">Created at</th>
            <th scope="col">Actions</th>
            <th scope="col">Delete</th>
          </tr>
        </thead>
        <tbody>
        @foreach($posts as $index => $value)  
        <tr>
        <th scope="row">{{$value['id']}}</th>
        <td>{{$value->user->name}}</td>
            <td>{{$value['title']}}</td>
            <td>{{$value['slug']}}</td>
            <td>{{$value['content']}}</td>
            <td>{{$value['created_at']->format('Y-M-D')}}</td>
            <td>
                <a class="btn btn-primary" href="{{route('posts.show',['post' => $value['id'] ])}}">View </a>
                <a class="btn btn-success" href="{{route('posts.edit',['post' => $value['id'] ])}}">Edit</a>
               
        </td>
        <td> <div calss="d-md-inline ">
              <form method="POST"  action="/posts/{{$value['id']}}">
              {{method_field('DELETE')}}
              @CSRF
              <button value="delete" onclick='return confirm("Are you sure you want to delete?")' class="btn btn-danger" >delete</button>

              </form></div></td>
          </tr>
          @endforeach
          {{ $posts->links() }}

        </tbody>
      </table>
      </div></div></div>
@endsection