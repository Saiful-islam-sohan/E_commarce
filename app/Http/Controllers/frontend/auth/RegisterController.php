<?php

namespace App\Http\Controllers\frontend\auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerStoreRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function registerPage()
    {
        return view('frontend.pages.auth.register');
    }
    public function registerStore(CustomerStoreRequest $request)
    {
        // dd($request->all());

        $user=User::create([
                'name'=>$request->name,
                'phone'=>$request->phone,
                'email'=>$request->email,
                'password'=>Hash::make($request->password),
        ]);
        // return back();

        $credentials=[
            'email'=>$request->email,
            'password'=>$request->password,
        ];

        if(Auth::attempt($credentials))
        {
            $request->session()->regenerate();
            return redirect()->route('customer_dashboard');
        }

    }

    public function loginPage()
    {
        return view('frontend.pages.auth.login');
    }

    public function loginStore(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:4'
        ]);

        $credentials=[
            'email'=>$request->email,
            'password'=>$request->password,
        ];

        if(Auth::attempt($credentials, $request->filled('remember')))
        {
            $request->session()->regenerate();
            return redirect()->route('customer_dashboard');
        }

        return back()->withErrors([
                   'email'=>'Wrong Credentials found!'
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        // $request->session()->regenerateToken();

        return redirect()->route('login_page');

    }
}
