<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function show(){
        $categories =Category::all();
        return view('admins.categories.index',[
            'categories' => $categories,
        ]);
    }


    public function save(Request $request){
       
  
            $category = new Category();
            $category['title']=$request->title;
            $category->save();
            return redirect('admin/categories');
     
    }


    public function destroy($id){
        $category = Category::find($id);
        $category->delete();
        return redirect('admin/categories');

    }
    public function showedit($id){
        $category=Category::findOrfail($id);
      
        return view('admins.categories.edit',[
            'category' => $category,
        ]);
    }
    public function edit(Request $request,$id){

            $category = Category::find($id);
            $category->title=$request->title;
            $category->id=$request->id;
            $category->save();
            return redirect('admin/categories');
        

    } 
}
