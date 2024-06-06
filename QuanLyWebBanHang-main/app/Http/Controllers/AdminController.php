<?php

namespace App\Http\Controllers;
use Hash;
use Illuminate\Support\Facades\Redirect;
use Session;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class AdminController extends Controller
{
public function login(){
    return view ('admin.login');
}
//
public function layout(){
    return view('admin.dashboard');
}
      public function dashboard(Request $request){
        $admin_email = $request->admin_email;
        $admin_password = md5($request->admin_password);

     
        $result = DB::table('tbl_admin')->where('admin_email',$admin_email)->orwhere('admin_password',$admin_password)->first();
      
            if($result){

        Session::put('admin_name',$result -> admin_name);
        Session::put('admin_id',$result ->admin_id);
        return view('admin.dashboard');
       
       }
       else{
        Session ::put('message','Mat khau hoac tai khoan sai!');
        return Redirect::to('/admin');
       }
        // return view('admin.dashboard');
      }
      public function logout(){
        Session::put('admin_name',null);
        Session::put('admin_id',null);
        return Redirect::to('/admin');
      }
}


