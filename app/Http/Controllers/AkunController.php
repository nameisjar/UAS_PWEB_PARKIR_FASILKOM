<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AkunController extends Controller
{
    public function login(Request $request){
        if (Auth::guard('admin')->attempt(['email'=>$request->email, 'password'=>$request->password])){
            return redirect('/');
        }
        return redirect()->back();
    }

    public function logout(){
        if (Auth::guard('admin')->check()){
            Auth::guard('admin')->logout();
        }
        return redirect('/login');
    }
}
