<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    function allCategory(){
        $category=Category::select('id','title','description')->get();
        return response()->json([
            'category'=>$category
        ]);
    }
    function searchCategory(Request $request){
        $search=$request->key;
        $category=Post::where('category_id','Like','%'.$search.'%')->get();
        return response()->json([
            'category'=>$category
        ]);
    }
   

}
