@extends('app')

@section('content')
<div class="container"><div class="row"><div class="col">
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Slug</th>
            <th scope="col">Created_Name</th>
            <th scope="col">Content</th>
            <th scope="col">Created at</th>
           
          </tr>
        </thead>
        <tbody>
          
        <tr>
        <th scope="row">{{$mypost['id']}}</th>
            <td>{{$mypost['title']}}</td>
            <td>{{$mypost['slug']}}</td>
            <td>{{$mypost->user->name}}</td>
            <td>{{$mypost['content']}}</td>
            <td>{{$mypost['created_at']->format('D-M-Y')}}</td>
            <td>
                
        </td>
          </tr>
         

        </tbody>
      </table>
      </div></div></div>
@endsection

