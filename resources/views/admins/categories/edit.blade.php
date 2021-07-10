@extends('admins.articles.body.header')
@section('content')
<div class="container">
   <h1>Edit category</h1>
   <div class="row">
    <form class="col s12" action="{{ route('categories.edit',$category->id) }}" method="post" enctype="multipart/form-data">
    @csrf
      <div class="row">
        <div class="input-field col s6">
          <input id="category" name ="title" type="text" class="validate" value="{{$category->title}}">
          <label for="category">name of category</label>
        </div>
        </div>


      <div class="center-align">
      <input class="btn btn-primary" type="submit" value="Edit Category">
      </div>
    </form>
  </div>
  </div>
  @endsection