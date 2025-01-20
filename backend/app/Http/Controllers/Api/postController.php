<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use App\Models\Reaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class postController extends Controller
{
    function allPost(){
        $post=Post::get();
        return response()->json([
            'post'=>$post
        ]);
    }
    function searchPost(Request $request){


        $post = Post::where('title', 'LIKE', '%'.$request->key.'%')->get();
        return response()->json([
            'searchdata'=>$post
        ]);
    }
    function details(Request $request){

        $post=Post::where('id',$request->postid)->first();
        return response()->json([
            'post'=>$post
        ]);
     }
     function comment(Request $request){

        $data=[
            'comment'=>$request->message,
            'post_id'=>$request->post_id,
            'user_id'=>$request->user_id,
        ];
        Reaction::create($data);
        $message=Reaction::select('users.name as user_name','users.id','reactions.*')->leftJoin(
            'users','reactions.user_id','users.id'
        )->get();
        return response()->json([
        'comment'=>$message
        ]);


    }
    function allComment(){
        $message=Reaction::select('users.name as user_name','users.id','reactions.*')->leftJoin(
            'users','reactions.user_id','users.id'
        )->get();
        return response()->json([
        'comment'=>$message
        ]);
    }
}
