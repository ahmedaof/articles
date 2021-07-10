<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;
use App\Models\Comment;
use Auth;
use DB;


class UserController extends Controller
{
    public function logout(){
        Auth::logout();
        return redirect('login');
    }

    
    public function show(){
        $comments= DB::table('comments')->join('articles','comments.article_id','articles.id')
        ->select("articles.id",'comments.*');
       
        $data['comments'] = $comments->get();
      
        $data['articles'] = Article::all();
        return view('users.index',$data);
 
    }

    public function addcomment(Request $request,$id){
       $comment = new Comment();
       $comment->comment=$request->comment;
       $comment->owner=Auth::user()->name;
       $comment->article_id = $id;
       $comment->save();
       $data['comments'] = Comment::all();
       $data['articles'] =Article::all();

       return view('users.articles.comment',$data);

    }
    public function deletecomment($id){
 
        $comment = Comment::find($id);
        $comment->delete();
        return redirect('/users/articles');

    }

    public function showd($id){
       $data['articles']=DB::table('articles')->where('category_id',$id)->get();

       return view('users.articles',$data);
    }


    public function showcat(){

        $data['categories']= Category::all();
        return view('users.articles.userCategoriec',$data);

    }
}
