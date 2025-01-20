<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileController extends Controller
{
    function home(){
        $id=Auth::user()->id;
        $user=User::select('id','name','email','phone','address','gender')->where('id',$id)->first();
        return view('admin.profile.index',compact('user'));
    }
    function adminupdate(Request $req){

     $this->check($req);
     User::where('id',Auth::user()->id)->update([
         'name' =>$req->name,
         'email' =>$req->email,
         'phone' =>$req->phone,
         'address' =>$req->address,
         'gender' =>$req->gender,
     ]);

     return back()->with(['updatesuccess'=>'admin account updated successfully']);
    }
    function changepasswordpage(){
        return view('admin.profile.changepassword');
    }
    function changepassword(Request $req){
     $this->checkpassword($req);
     $oldpassword=Auth::user()->password;
     if (password_verify($req->oldpassword,$oldpassword)){
         User::where('id',Auth::user()->id)->update([
             'password' =>password_hash($req->newpassword,PASSWORD_DEFAULT)]);
             return to_route('home');}
             else{
                return back()->with(['updateerror'=>'Password cannot be updated']);
             }
    }
    private function check($req){
        $req->validate([
            'name' =>'required',
            'email' =>'required',
            'phone' =>'required',
            'address' =>'required',
            'gender' =>'required',
        ]);
    }
    private function checkpassword($req){
        $req->validate([
            'oldpassword' =>'required',
            'newpassword' =>'required',
            'conpassword' =>'required|same:newpassword',
        ]);
    }
}
