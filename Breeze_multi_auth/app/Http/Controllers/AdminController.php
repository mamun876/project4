<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
   public function index(){
   return view('admin.login');
   }
   public function login(Request $req){
      // dd($req->all());
      if (Auth::guard('admin')->attempt(['email' => $req->email, 'password' => $req->password])) {
        return redirect()->route('admin.dashboard');
     } else {
         return redirect()->route('admin_login.form')->with('msg', "provide correct info");
     }
    
   }
   public function dashboard(){
      return view ('admin.dashboard');
   }
}
