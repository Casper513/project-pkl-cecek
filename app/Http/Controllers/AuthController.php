<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function proseslogin(Request $request)
    {
      if(Auth::guard('karyawan')->attempt(['TMT'=>$request->TMT, 'password'=>$request->password])){
        return redirect('/dashboard');
      } else {
        return redirect('/')->with(['warning'=>'TMT / password salah']);  
      }
    }
    public function proseslogout(){
      if(Auth::guard('karyawan')->check()){
        Auth::guard('karyawan')->logout();
       return redirect('/');
      }
    }
}
 