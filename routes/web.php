<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix'=> 'admin','middleware'=>['admin:admin']],function(){
    Route::get('/login',[AdminController::class,'loginForm']);
    Route::post('/login',[AdminController::class,'store'])->name('admin.login');
    
});
 

Route::group(['prefix'=> 'admin','middleware'=>['admin:admin'],'middleware' => ['auth:admin']],function(){
  

 
    Route::get('/logout',[AdminController::class,'destroy'])->name('destroy');
    Route::get('articles/create',[ArticleController::class,'ArticleAdd'])->name('articles.create.show');
    Route::post('articles/create',[ArticleController::class,'save'])->name('articles.create');
    Route::get('/articles',[ArticleController::class,'show'])->name('articles.show');
    Route::get('/articles/delete/{id}',[ArticleController::class,'destroy'])->name('articles.delete');
    Route::get('/articles/edit/{id}',[ArticleController::class,'showedit'])->name('articles.edit.show');
    Route::post('/articles/edit/{id}',[ArticleController::class,'edit'])->name('articles.edit');



    
    
    Route::get('/categories',[CategoryController::class,'show'])->name('categories.show');
    Route::get('categories/create', function () {
        return view('admins/categories/create');})->name('categories.create.show');
    Route::post('categories/create',[CategoryController::class,'save'])->name('categories.create');
   
    Route::get('/categories/delete/{id}',[CategoryController::class,'destroy'])->name('categories.delete');
    Route::get('/categories/edit/{id}',[CategoryController::class,'showedit'])->name('categories.edit.show');
    Route::post('/categories/edit/{id}',[CategoryController::class,'edit'])->name('categories.edit');
    
    


    
});
Route::get('/categories',[CategoryController::class,'show']);
Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard',[ArticleController::class,'showadmin'])
->name('dashboard');

Route::group(['middleware'=>['user:user'],'middleware' => ['auth:sanctum', 'verified']],function(){
    Route::middleware(['auth:sanctum', 'verified'])->get('/web/dashboard',[UserController::class,'show'])->name('users.show');



Route::get('/dashboard',[ArticleController::class,'showadmin'])->name('dashboard');
Route::get('/',[ArticleController::class,'showadmin'])->name('dashboard');
Route::get('users/logout',[UserController::class,'logout'])->name('users.logout');
Route::get('users/articles',[UserController::class,'show'])->name('users.articles.create.show');
Route::post('/users/comment/create/{id}',[UserController::class,'addcomment'])->name('users.comment.create');
Route::get('/users/comment/delete/{id}',[UserController::class,'deletecomment'])->name('users.comment.delete');


Route::get('/articles/{id}',[UserController::class,'showd'])->name('users.articles.show');
Route::get('/users/categories',[UserController::class,'showcat'])->name('users.categories.show');


});

