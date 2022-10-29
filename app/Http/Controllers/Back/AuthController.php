<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index(){
        return view('back.auth.login');
    }
    public function loginpost(Request $request){
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
           return redirect()->route('dashboard');
        }
        return redirect()->back()->withErrors("check your email and password!");
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
