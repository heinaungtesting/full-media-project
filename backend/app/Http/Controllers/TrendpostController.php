<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\ActionLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TrendpostController extends Controller
{
    function trend(){
        $data=ActionLog::select('action_logs.*','posts.*',DB::raw('COUNT(action_logs.post_id) as post_count'))->
        leftJoin('posts','posts.id','action_logs.post_id')->groupBy('action_logs.post_id')->get();
        return view('admin.trendpost.trend',compact('data'));
    }
    function trenddetail($id){
        $post=Post::where('id',$id)->first();

        return view('admin.trendpost.detail',compact('post'));
    }
}
