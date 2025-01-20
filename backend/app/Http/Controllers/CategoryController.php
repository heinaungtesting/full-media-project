<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    function category(){
        $category=Category::get();
        return view('admin.category.category',compact('category'));
    }
    function createCategory(Request $req){
        $req->validate([
            'categoryName'=>'required',
            'categoryDes'=>'required',
        ]);
        Category::create([
            'title'=>$req->categoryName,
            'description'=>$req->categoryDes,
        ]);
        return back()->with(['success'=>'Category created successfully']);
    }
    function deleteCategory($id){
        Category::where('id',$id)->delete();
        return back()->with(['deletesuccess'=>'Category deleted successfully']);
    }
    function searchCategory(Request $req){
        $category = Category::orWhere('title','LIKE','%'.$req->categorySearchkey.'%')
        ->orWhere('description','LIKE','%'.$req->categorySearchkey.'%')
        ->get();
        return view('admin.category.category',compact('category'));
    }
    function categoryeditpage($id){
        $category=Category::where('id',$id)->first();

        return view('admin.category.edit',compact('category'));
    }
    function categoryupdate(Request $req){
        $req->validate([
            'categoryName'=>'required',
            'categoryDes'=>'required',
        ]);
        Category::where('id',$req->id)->update([
            'title'=>$req->categoryName,
            'description'=>$req->categoryDes,
        ]);
        return to_route('category');
    }
}
