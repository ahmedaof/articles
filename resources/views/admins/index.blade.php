@extends('admins.articles.body.header')
@section('content')
    <h1 class="center-align">admin</h1>
  
   
  
  <div class="container">
  <h3> all Articles</h3>
  <ul class="collapsible">
  @if(count($articles) == 0)
  <h5 class="center-align">  no articles added  </h5>
  @endif
  @foreach($articles as $article )
  <li>
    <div class="collapsible-header">{{$article->title}}</div>
    <div class="collapsible-body"><span>{{$article->content}}</span><br><br>
       <img src="{{ asset($article->image_path) }}" width="200" height="100">
       @if(Auth::user())
       <div>
       <a href="{{route('articles.edit.show',$article->id)}}" class="btn btn-primary">Edit</a>
       <a href="{{route('articles.delete',$article->id)}}" class="btn btn-danger red">Delete</a>
       </div>
       @endif

       <div>
       
       @foreach($comments as $comment ) 

@if($comment->article_id==$article->id)
      <p>comment:{{$comment->comment}}</p>

      @endif
      @endforeach
 

       
       </div>

       </div>
  
  </li>
@endforeach
</ul>



  
  <div class="container">
  <h1>All Category</h1>
  <ul class="collapsible">
  @foreach($categories as $category )
  <li>
    <div class="collapsible-header">{{$category->title}}
    
    </div>

   
   <div class="collapsible-body"><span>Action</span>
       <a  href="{{route('categories.edit.show',$category->id)}}" class="btn btn-primary">Edit</a>
       <a  href="{{route('categories.delete',$category->id)}}" class="btn btn-danger red">Delete</a>
       </div>
  
       </li>
@endforeach
</ul>
   @endsection