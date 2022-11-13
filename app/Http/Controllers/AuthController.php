<?php

namespace App\Http\Controllers;

use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request){
        $credentials = $request -> validate([
            "email" => ["required","email"],
            "password" => ["required"]
        ]);

        if(Auth::attempt($credentials , false)){
            // $request->session()->regenerate();
            
            return redirect(RouteServiceProvider::HOME);
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect("login");
    }
}
