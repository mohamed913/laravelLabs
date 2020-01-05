@extends('layouts/app')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@section('content')
<div class="container"><div class="row"><div class="col">
<form method="POST" action="/posts/{{$ourpost['id']}}" >
{{method_field('PUT')}}
@csrf
<div class="form-group">

 <label >title</label> <input value={{$ourpost['title']}} class="form-control" type="text" name="title"><br>

 <label >descriptin</label><textarea name="content">{{$ourpost['content']}}</textarea><br>
   
   
   

  </div>
 
     <input class="btn btn-primary" type="submit" value="update" name="update">
    
    </form></div></div></div>
    @endsection