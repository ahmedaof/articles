<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;
use App\Models\Comment;
use DB;
use Auth;

class ArticleController extends Controller
{

    public function show(){
        $articles =DB::table('articles')->join('categories','articles.category_id','categories.id')
        ->select('categories.title','articles.*');

        $articles = $articles->get();
     
        return view('admins.articles.index',[
            'articles' => $articles,
        ]);
    }


    public function ArticleAdd(){
    	$data['categories'] = Category::all();
    	return view('admins.articles.create',$data);
    }


    public function save(Request $request){
        if($request->file('image')){
            $article = new Article();
            $categories =Category::all();
                $file = $request->file('image');
                $an="/article_images/";
                $filename = $an.date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('article_images'),$filename);
                $article['image_path'] = $filename;
            
                $article['title']=$request->title;
                $article['content']=$request->content;
                $article['category_id']=$request->category_id;
            $article->save();
            return redirect('admin/articles');
        }else{
            $article = new Article();
            $article['title']=$request->title;
            $article['content']=$request->content;
            $article['category_id']=$request->category_id;
            $article->save();
            return redirect('admin/articles');
        }
    }


    public function destroy($id){
        $article = Article::find($id);
        $article->delete();
        return redirect('admin/articles');

    }
    public function showedit($id){
        $article=Article::findOrfail($id);
        $categories =Category::all();
      
        return view('admins.articles.edit',[
            'article' => $article,
            'categories'=>$categories
        ]);
    }
    public function edit(Request $request,$id){
        if ($request->file('image')) {
            $article = Article::find($id);
            $categories =Category::all();
    		$file = $request->file('image');
    		@unlink(public_path('upload/employee_images/'.$user->image));
            $an="/article_images/";
            $filename = $an.date('YmdHi').$file->getClientOriginalName();
    		$file->move(public_path('article_images'),$filename);
            $article['image_path'] = $filename;
    	
            
                $article['title']=$request->title;
                $article['content']=$request->content;
                $article['category_id']=$request->category_id;
                $article['id']=$request->id;
                
            $article->save();
            return redirect('admin/articles');
        }else{
            $article = Article::find($id);
            $categories =Category::all();
            $article->title=$request->title;
            $article->content=$request->content;
            $article['category_id']=$request->category_id;
            $article->id=$request->id;
            $article->save();
            return redirect('admin/articles');
        }

    } 


    public function showadmin(){
        $data['articles']=Article::all();
        $data['categories']=Category::all();
        $data['comments']=Comment::all();

        return view('admins.index',$data);

    }
}
