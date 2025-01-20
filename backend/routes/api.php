<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Api\postController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\actionLogController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

/* Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
}); */
Route::post('user/login',[AuthController::class,'login']);
Route::post('user/register',[AuthController::class,'register']);
Route::get('allPost',[postController::class,'allPost']);
Route::post('post/search',[postController::class,'searchPost']);
Route::post('post/detail',[postController::class,'details']);
//category
Route::get('allCategory',[CategoryController::class,'allCategory']);
Route::post('category/search',[CategoryController::class,'searchCategory']);
//actionLog
Route::post('post/actionLog',[actionLogController::class,'actionLog']);
//Comment
Route::post('post/comment',[postController::class,'comment']);
Route::post('post/comment/delete',[postController::class,'deleteComment']);
Route::get('post/allcomment',[postController::class,'allComment']);

