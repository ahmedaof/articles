@extends('users.articles.body.header')
@section('content')
    <h1>Articles</h1>
  
    <div class="container">
    <ul class="collapsible">
    @foreach($articles as $article )
    <li>
      <div class="collapsible-header">{{$article->title}}</div>
      <div class="collapsible-body"><span>{{$article->content}}</span><br><br>
         <img src="{{ asset($article->image_path) }}" width="200" height="100">
         
         @foreach($comments as $comment )
         @if($article->id==$comment->article_id)
       <h6>owner:{{$comment->owner}}</h6>
      <p>comment:{{$comment->comment}}   <a href="/users/comment/delete/{{$comment->id}}"> <i class="material-icons">clear</i></p></a></p>

  
   
    @endif
    @endforeach


         <div>
         <ul class="collapsible">
           <li>
         <div class="collapsible-header">Add comment</div>
         <div class="collapsible-body">
         <div class="row">
         <div class="input-field col s6">
         <form action="{{route('users.comment.create',$article->id)}}" method = "POST" enctype="multipart/form-data">
         @csrf
      <label type="label" class="active" for="Comment">Add Comment</label>
      <input id="Comment" type="text" name="comment" class="validate">
      <button class="btn btn-primary" type="submit">submit comment</button>
      </form>
    </div>
    </div>
         
         </div>

          </ul>
         </div>
         </div>
    
    </li>
  @endforeach
  </ul>

    </div>
   @endsection


