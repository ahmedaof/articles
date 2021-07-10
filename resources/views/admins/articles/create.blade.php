@extends('admins.articles.body.header')
@section('content')
<div class="container">
   <h1>admin</h1>
   <div class="row">
    <form class="col s12" action="{{route('articles.create')}}" method="POST" enctype="multipart/form-data">
    @csrf
      <div class="row">
        <div class="input-field col s6">
          <input id="title" name ="title" type="text" class="validate">
          <label for="title">Title of Article</label>
        </div>
        </div>
        <div class="row">
        <div class="input-field col s6">
        <select name="category_id" required="" class="form-control">
			 @foreach($categories as $category)
			<option value="{{ $category->id }}">{{ $category->title }}</option>
      <label>Categories</label>
		 	@endforeach
			 
		</select>
        </div>
      </div>
        <div class="row">
        <div class="input-field col s6">
          <input id="content" name ="content"  type="text" class="validate">
          <label for="content">Content of Article </label>
        </div>
      </div>

      <div class="form-group">
		<h5>Profile Image <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="file" name="image" class="btn btn-primary" id="image" >  </div>
	 </div>

        			<div class="col-md-3">

 		 <div class="form-group">
		<div class="controls">
	<img id="showImage" src="" style="width: 100px; width: 100px; border: 1px solid #000000;"> 

	 </div>
	 </div>
	  
 			</div>

      <div class="center-align">
      <input class="btn btn-primary" type="submit" value="add Article">
      </div>
    </form>
  </div>
  </div>
 @endsection