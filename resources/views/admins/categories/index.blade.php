@extends('admins.articles.body.header')
@section('content')
<style>

.btnc{
  position: relative;
    left: 736px;
} 

</style>
    <h1>Category</h1>
  
    <div class="container">
    <ul class="collapsible">
    @foreach($categories as $category )
    <li>
      <div class="collapsible-header">{{$category->title}}
    
  @if(!Auth::check())
     <a href="{{route('users.articles.show',$category->id)}}" class="btnc btn">articles</a>
 
      @endif
      
      </div>
  
     
     <div class="collapsible-body"><span>Action</span>
         <a  href="{{route('categories.edit.show',$category->id)}}" class="btn btn-primary">Edit</a>
         <a  href="{{route('categories.delete',$category->id)}}" class="btn btn-danger red">Delete</a>
         </div>
    
         </li>
  @endforeach
  </ul>
 
    <a href="{{route('categories.create.show')}}" >add Category</a>

    </div>
   @endsection