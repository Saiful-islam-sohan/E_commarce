<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use BadFunctionCallException;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function loginpage()
    {
        return view('backend.pages.auth.login');
    }

    public function login(Request $request)
    {
        $validated= $request->validate([
            'email'=>'bail|required|email',
            'password'=>'bail|required|min:4'
        ]);
        $credentials=[
         'email'=>$request->email,
         'password'=>$request->password
        ];
        if (Auth::attempt($credentials,$request->filled('remember'))) {
            // Authentication successful
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }
}
