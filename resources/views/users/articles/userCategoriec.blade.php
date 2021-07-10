@extends('users.articles.body.header')
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
    

     <a href="{{route('users.articles.show',$category->id)}}" class="btnc btn">articles</a>
 
   
      
      </div>
    
         </li>
  @endforeach
  </ul>
 
  

    </div>
 


@endsection