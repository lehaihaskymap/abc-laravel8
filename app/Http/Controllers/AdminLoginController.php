<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function getlogin()
    {
        if (Auth::check()){
            return redirect()->route('admin.dashboard');
        }
        else{
            return view('admin.login');
        }
    }
    public function postlogin(Request $request)
    {
        $login=[
            'email'=>$request->txtEmail,
            'password' => $request->txtPassword,
        ];

        if (Auth::attempt($login,$request->chkRemember)){
            $request->session()->regenerate();

            return redirect()->intended(route('admin.dashboard'));
        }
        else{
            return back()->withErrors(['message'=> 'Email hay Password không chính xác']);
        }
    }
    public function getlogout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.getlogin');
    }
}
