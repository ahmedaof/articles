@extends('admins.articles.body.header')
@section('content')

<style>

h5{
  position: relative;
    top: -9px;
}


</style>

    <h1>Articles</h1>
  
    <div class="container">
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
         </div>
    
    </li>
  @endforeach
  </ul>
  
    <a href="{{route('articles.create.show')}}" >add article</a>
  
    </div>
   @endsection