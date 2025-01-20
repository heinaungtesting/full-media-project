<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ListController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TrendpostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routesx
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return to_route('login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('dashboard',[ProfileController::class,'home'])->name('home');
    //admin password change
    Route::post('admin/update',[ProfileController::class,'adminupdate'])->name('adminupdate');
    Route::get('admin/changepassword',[ProfileController::class,'changepasswordpage'])->name('changepasswordpage');
    Route::post('admin/changepassword',[ProfileController::class,'changepassword'])->name('changepassword');
    //admin list
    Route::get('admin/list',[ListController::class,'list'])->name('list');
    Route::get('admin/delete/{id}',[ListController::class,'deleteuser'])->name('deleteuser');
    Route::post('admin/search',[ListController::class,'searchAdmins'])->name('searchAdmins');
    //category
    Route::get('category',[CategoryController::class,'category'])->name('category');
    Route::post('category/create',[CategoryController::class,'createCategory'])->name('createCategory');
    Route::get('category/delete/{id}',[CategoryController::class,'deleteCategory'])->name('deleteCategory');
    Route::post('category/search',[CategoryController::class,'searchCategory'])->name('searchCategory');
    Route::get('category/editpage/{id}',[CategoryController::class,'categoryeditpage'])->name('categoryeditpage');
    Route::post('category/update',[CategoryController::class,'categoryupdate'])->name('categoryupdate');
    //post
    Route::get('post',[PostController::class,'post'])->name('post');
    Route::post('post/create',[PostController::class,'createPost'])->name('createPost');
    Route::get('post/delete/{id}',[PostController::class,'deletePost'])->name('deletePost');
    Route::post('post/search',[PostController::class,'searchPost'])->name('searchPost');
    Route::get('post/editpage/{id}',[PostController::class,'posteditpage'])->name('posteditpage');
    Route::post('post/update',[PostController::class,'postupdate'])->name('postupdate');
    //trendpost
    Route::get('trendpost',[TrendpostController::class,'trend'])->name('trend');
    Route::get('trendpost/detail/{id}',[TrendpostController::class,'trenddetail'])->name('trenddetail');
});
