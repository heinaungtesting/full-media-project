<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\Reaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Egulias\EmailValidator\Validation\Exception\EmptyValidationList;

class PostController extends Controller
{
    function post(){
        $category=Category::get();
        $post=Post::get();
        return view('admin.post.post',compact('category','post'));
    }
    function createPost(Request $request){
        $request->validate([
            'postTitle'=>'required',
            'postDes'=>'required',
            'postCategory'=>'required',
            'postImage'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if(!empty($request->postImage)){
            $file=$request->file('postImage');
        $filename=uniqid().'_'.$file->getClientOriginalName();
        $file->move(public_path().'/postImage',$filename);
        $data=$this->getPostData($request,$filename);
        Post::create($data);
        return redirect()->back()->with('success','Post Created Successfully');


        }else{
            $data=$this->getPostData($request,null);
        }

    }
    function deletePost($id){
        $postData=Post::where('id',$id)->first();
        $postImageName=$postData->image;
        if(File::exists(public_path('postImage/'.$postImageName))){
            File::delete(public_path('postImage/'.$postImageName));
        }
        Post::where('id',$id)->delete();

        return redirect()->back()->with('deletesuccess','Post Deleted Successfully');
    }
    function searchPost(Request $request){
        $category=Category::get();
        $post=Post::where('title','like','%'.$request->postsearchkey.'%')->first();
        return view('admin.post.post',compact('category','post'));
    }
    function posteditpage($id){
        $category=Category::get();

        $post=Post::where('id',$id)->first();
        $allpost=Post::get();

        return view('admin.post.edit',compact('category','post','allpost'));
    }
    function postupdate(Request $request){
        $request->validate([
            'postTitle'=>'required',
            'postDes'=>'required',
            'postCategory'=>'required',
            'postImage'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    $data=$this->getupdatePostData($request);
    if(isset($request->postImage)){
        $file=$request->file('postImage');
        $filename=uniqid().'_'.$file->getClientOriginalName();
        $postdata=Post::where('id',$request->postid)->first();
        $postImageName=$postdata->image;
        if(File::exists(public_path('postImage/'.$postImageName))){
            File::delete(public_path('postImage/'.$postImageName));
        }
        $file->move(public_path().'/postImage',$filename);
        $data['image']=$filename;
    }
    Post::where('id',$request->postid)->update($data);
    return redirect()->back()->with('success','Post Updated Successfully');
    }
  
   private function getupdatePostData($request){
        return[
            'title'=>$request->postTitle,
            'description'=>$request->postDes,
            'category_id'=>$request->postCategory,
        ];
    }
    private function getPostData($request,$filename){
        return[
            'title'=>$request->postTitle,
            'description'=>$request->postDes,
            'category_id'=>$request->postCategory,
            'image'=>$filename,
        ];

    }
}
