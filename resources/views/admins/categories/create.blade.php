@extends('admins.articles.body.header')
@section('content')
<div class="container">
   <h1>admin</h1>
   <div class="row">
    <form class="col s12" action="{{route('categories.create')}}" method="POST" enctype="multipart/form-data">
    @csrf
      <div class="row">
        <div class="input-field col s6">
          <input id="category" name ="title" type="text" class="validate">
          <label for="category">Name of Category</label>
        </div>
        </div>
       
  
	  
 			</div>

      <div class="center-align">
      <input class="btn btn-primary" type="submit" value="Add Category">
      </div>
    </form>
  </div>
  </div>
 @endsection