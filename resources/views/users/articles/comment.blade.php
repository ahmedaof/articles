@extends('users.articles.body.header')
@section('content')


@foreach($articles as $article ) 
<h3>{{$article->title}}</h3>

@foreach($comments as $comment ) 

@if($comment->article_id==$article->id)
      <p>comment:{{$comment->comment}}</p>

      @endif
      @endforeach
 
@endforeach
@endsection