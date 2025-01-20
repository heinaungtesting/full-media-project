<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;


class ListController extends Controller
{
    function list(){
        $user=User::select('id','name','email','phone','address','gender')->get();
        return view("admin.list.list",compact('user'));
    }
    function deleteuser($id){
   User::where('id',$id)->delete();

   return back()->with(['deletesuccess'=>'User deleted successfully']);
    }
    function searchAdmins(Request $req){
       $user = User::where('name','LIKE','%'.$req->search.'%')
       ->orWhere('email','LIKE','%'.$req->search.'%')
       ->orWhere('address','LIKE','%'.$req->search.'%')
       ->orWhere('gender','LIKE','%'.$req->search.'%')
       ->get();
       return view('admin.list.list',compact('user'));
    }
}
