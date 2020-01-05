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
<div class="container  text-dark">  <div class="row"> <div class="col-lg-6">
<form method="POST" action="/posts" >
@csrf
<div class="form-group">

 <label >title</label> <input class="form-control" type="text" name="title"><br>

 <label >description</label><textarea name="content"></textarea><br>
   
   
   

  </div>
 
     <input class="btn btn-primary" type="submit" name="submit">
    
    </form></div></div></div>
    @endsection